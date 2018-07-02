<?php

class Sync_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('feedback_model', 'feedback_model');
    $this->load->model('personal_information_model', 'personal_information_model');
    $this->load->model('survey_model', 'survey_model');

    $this->questions = [
      # personal information
      'name' => 'Name',
      'gender' => 'Gender',
      'age' => 'Age',
      'civil_status' => 'Civil status',
      'occupation' => 'Occupation',
      'current_residence' => 'Current residence',
      'work_location' => 'Work location',
      'email_address' => 'Email address',
      'mobile_number' => 'Mobile number',
      'how_many_guests' => 'How many guests are with you?',
      # other information
      'is_current_buyer' => 'Are you a current Amaia buyer?',
      'purpose_of_visit_buyer' => 'Purpose of visit (if an Amaia buyer)',
      'purpose_of_visit_non_buyer' => 'Purpose of visit (if NOT an Amaia buyer)',
      'source' => 'How did you learn about Amaia?',
      'budget' => 'How much is your budget to invest for a property?',
      'primary_interest' => 'What project are you most interested in?',
      'secondary_interest' => 'What other projects are you also interested in, if any?',
      'primary_amenities' => 'What amenities do you consider as top-priority?',
      'secondary_amenities' => 'What amenities do you consider secondary?',

      # survey

      'buying_experience' => 'Buying experience',
      'be_knowledge' => 'Knowledge of seller',
      'be_courtesy' => 'Courtesy and attitude of the seller',
      'be_response' => 'Response time of the seller in attending to your needs/concerns',
      'be_appearance' => 'Appearance and attire of the seller',

      'site_visit_experience' => 'Site visit experience',
      'sve_appearance' => 'Appearance and orderliness of the site’s main entrance',
      'sve_attractiveness' => 'Attractiveness and cleanliness of the interiors of the model units',
      'sve_orderliness' => 'Orderliness of the site’s model block (ie. outside the model units)',
      'sve_safety' => 'Safety and security at the site and model units',
      'sve_accessibility' => 'Accessibility/location of the site',

      'showroom_sales_office_model_unit' => 'Showroom/Sales Office/Model Unit' ,
      'ssomu_cleanliness' => 'Cleanliness and orderliness of the showroom/sales office',
      'ssomu_safety' => 'Safety and security of the showroom/sales office',
      'ssomu_completeness' => 'Completeness of information at the showroom/sales office',
      'ssomu_accessibility' => 'Accessibility/location of the showroom/sales office',
      'ssomu_comfort' => 'Comfort at the showroom/sales office (eg. temperature, noise levels)',

      'product' => 'Product',
      'p_design' => 'Design and lay-out of the units/buildings',
      'p_finishes' => 'Finishes and inclusions of the units',
      'p_sizes' => 'Sizes of the units',
      'p_amenities' => 'Amenities (pool, clubhouse/function rooms, playground, etc.)',
      'p_pricing' => 'Pricing of the units',
      'p_available' => 'Available payment terms/financing options',

      'home_buying_decision' => 'Home-Buying Decision',
      'hbd_how' => 'How likely is it that you would recommend this real estate company to others?',
      'hbd_how_testimonial' => 'Please leave a brief testimonial/feedback (optional)',
      'hbd_when' => 'When do you intend to reserve?',
      'hbd_if_not_purchasing' => 'If you do not intend to purchase, what were the reasons for such? (Choose maximum of three)',
      'hbd_recommend' => 'How likely is it that you would recommend this real estate company to others?',
      'hbd_recommend_testimonial' => 'Please leave a brief testimonial/feedback (optional):'
    ];
  }

  public function all()
  {

    $query_result = $this->db->query('
    SELECT personal_information.*, survey.*, feedback.* FROM feedback
    LEFT JOIN personal_information ON feedback.personal_information_id = personal_information.id
    LEFT JOIN survey ON feedback.survey_id = survey.id
    ORDER BY feedback.id DESC ' . $this->paginateStr())->result();

    $res = [];
    # Format our whole result
    foreach ($query_result as $key => $value) {
      $value->timestamp_f = date("F j, Y, g:i a", $value->timestamp);
      $res[] =  $value;
    }

    return $res;
  }

  public function getTotalPages()
  {
    $query_result = $this->db->query('
    SELECT * FROM feedback
    LEFT JOIN personal_information ON feedback.personal_information_id = personal_information.id
    LEFT JOIN survey ON feedback.survey_id = survey.id
    ORDER BY feedback.id DESC ')->result();

    return ceil(count($query_result) / $this->per_page);
  }

  # Calls 'full' by default
  public function get($id, $function = 'full')
  {
    return $this->$function($id);
  }

  # Returns all rows on the same level
  public function full($id)
  {
    $res = $this->db->query("
    SELECT * FROM feedback
    LEFT JOIN personal_information ON feedback.personal_information_id = personal_information.id
    LEFT JOIN survey ON feedback.survey_id = survey.id
    WHERE feedback.id = {$id}
    ORDER BY feedback.id DESC")->row();

    $res->timestamp_f = date("F j, Y, g:i a", $res->timestamp);

    return $res;
  }

  # Returns an formatted version
  public function obj($id)
  {
    $feedback = $this->db->get_where('feedback', ['id' => $id])->row();

    # Formatting feedback data
    $feedback->timestamp_f = date("F j, Y, g:i a", $feedback->timestamp);
    $feedback->created_at_f  = date("F j, Y, g:i a", strtotime($feedback->created_at));

    $res = (object) [
      'personal_information' => $this->personal_information_model->getPersonalInformation($feedback->personal_information_id),
      'other_information' => $this->explodeValues($this->personal_information_model->getOtherInformation($feedback->personal_information_id)),
      'meta' => $feedback
    ];

    # Survey block
    if ($feedback->survey_id) {
      $survey = @$this->nestSurvey($this->explodeValues($this->survey_model->get($feedback->survey_id)));
      if ($survey) {
        $res->survey = $survey;
      }
    }
    # / Survey block

    return $res;
  }

  public function explodeValues($arr)
  {
    # We format other information for appended shits
    $exploded_arr = [];
    if ($arr) {
      foreach ($arr as $key => $value) {
        # Explode if string contains pipe symbol
        $exploded_arr[$key] = (strpos($value, '|') !== false) ? explode('|', $value) : $value;
      }
    }

    return $exploded_arr;
  }

  public function nestSurvey($arr)
  {
    $buying_experience = [];
    $site_visit_experience = [];
    $showroom_sales_office_model_unit = [];
    $product = [];
    $home_buying_decision = [];

    $survey = []; # Init

    if ($arr) {
      foreach($arr as $key => $value) {
        if(startsWith($key, 'be_')) {
          $buying_experience[$key] = $value;
        } elseif (startsWith($key, 'sve_')) {
          $site_visit_experience[$key] = $value;
        } elseif (startsWith($key, 'ssomu_')) {
          $showroom_sales_office_model_unit[$key] = $value;
        } elseif (startsWith($key, 'p_')) {
          $product[$key] = $value;
        } elseif (startsWith($key, 'hbd_')) {
          $home_buying_decision[$key] = $value;
        }
      }

      $survey = (object) [
        'buying_experience' => $buying_experience,
        'site_visit_experience' => $site_visit_experience,
        'showroom_sales_office_model_unit' => $showroom_sales_office_model_unit,
        'product' => $product,
        'home_buying_decision' => $home_buying_decision
      ];
    }


    return $survey;
  }

  public function add($data)
  {
    # insert to personal_information and to survey first
    # should always exist
    $personal_information_id = $this->personal_information_model->add($data->personal_information);

    # optional. if survey exists
    if ((array)$data->survey && property_exists($data, 'survey')) {
      $survey_id = $this->survey_model->add($data->survey);
    } else {
      $survey_id = null;
    }

    # then try to add to feedback table
    return $this->feedback_model->add([
      'timestamp' => $data->meta->timestamp,
      'personal_information_id' => $personal_information_id,
      'survey_id' => $survey_id,
      'showroom' => $data->meta->showroom,
      'survey_start' => @$data->meta->survey_start,
      'survey_end' => @$data->meta->survey_end
    ]);
  }

}
