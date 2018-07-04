<?php

class Options_model extends Crud_model
{

  function __construct()
  {
    parent::__construct();

    # Personal Information stuffs
    $this->age = ['20s', '30s', '40s', '50s', '60s', '70s above'];
    $this->civil_status = ['Single', 'Married', 'Separated/Widow'];
    $this->occupation = ['Self-employed', 'Employed', 'Retired', 'Others'];
    $this->work_location =
    $this->current_residence =
    ['Nearby (< 30mins away)', 'Medium distance (1/2 to 1 hr away)',
    'Further away (over 1 hr away)', 'Others'];
    $this->how_many_guests = ['1', '2', '3', '4', '5+'];

    # Other information
    $this->buyer = ['To view my home',
    'To know the inclusions of my purchase',
    'To get real-time information on the project',
    'To get inspired by interior design of the model units',
    'To get a feel of the environment',
    'Others'];
    $this->non_buyer = ['I plan to purchase an Amaia unit and just need more information',
    'To see whether this would fit my immediate requirements for a home',
    'To get ideas for my future home',
    'Just curious about the new developments in my community',
    'Others'];
    $this->source = ['Amaia website',
    'Online articles',
    'Blogs',
    'Social media sites (e.g. Facebook)',
    'Property listing (e.g. Property 24)',
    'Recommendations from family or friends',
    'Exhibit/booth at mall or elsewhere',
    'Magazines/newspapers',
    'Billboards, streamers',
    'Flyers, brochures',
    'Saw the actual site',
    'Others'];
    $this->budget = ['Below 1M',
    '1M-1.9M',
    '2M-2.9M',
    '3M-3.9M',
    '4M-4.9M',
    'Above 5M'];
    $this->house_and_lot = ['Amaia Scapes Bauan',
    'Amaia Scapes Bulacan',
    'Amaia Scapes Cabanatuan',
    'Amaia Scapes Cabuyao',
    'Amaia Scapes Capas',
    'Amaia Scapes General Trias',
    'Amaia Scapes Iloilo',
    'Amaia Scapes Lucena',
    'Amaia Scapes North Point',
    'Amaia Scapes Pampanga',
    'Amaia Scapes San Fernando',
    'Amaia Scapes San Pablo',
    'Amaia Scapes Trece Martires',
    'Amaia Scapes Urdaneta',
    'Amaia Series Novaliches (townhouse)',
    'Amaia Square Novaliches (shophouse)'];
    $this->mid_rise = ['Amaia Steps Alabang',
    'Amaia Steps Altaraza',
    'Amaia Steps Bicutan',
    'Amaia Steps Capitol Central',
    'Amaia Steps Mandaue',
    'Amaia Steps Novaliches',
    'Amaia Steps Nuvali',
    'Amaia Steps Parkway Nuvali',
    'Amaia Steps Pasig',
    'Amaia Steps Sucat'];
    $this->high_rise = ['Amaia Skies Avenida',
    'Amaia Skies Cubao',
    'Amaia Skies Shaw',
    'Amaia Skies Sta. Mesa'];
    $this->amenities = ['Kids Playground',
    'Pocket parks/open spaces',
    'Swimming pool',
    'Clubhouse/function rooms',
    'Basketball court',
    'Soccer field',
    'Volleyball court',
    'Badminton/tennis court',
    'Gym',
    'Retail Shops',
    'Game room',
    'Study hall',
    'Others'];

    # Survey stuffs
    $this->when_reserve = ['Within this week',
    'Within a month',
    'Within six months',
    'Within a year',
    'Others'];
    $this->reasons_for_not_purchase = ['Location of the site (accessibility, safety)',
    'Orderliness of the site (entrance, main area)',
    'Design of the units',
    'Finishing of the units',
    'Amenities',
    'Condition of model units',
    'Condition of showroom/sales office',
    'Units are too small',
    'Units are too big',
    'Cannot afford price/monthly amortization',
    'Did not reflect description in ad',
    'Seller was not responsive',
    'Negative feedback from friends/family',
    'Preference for another development',
    'Undecided/unready to purchase a home',
    'Others'];
  }

  public function all()
  {
    return (object)[
      'personal_information' => $this->getPersonalInformation(),
      'other_information' => $this->getOtherInformation(),
      'survey' => $this->getSurvey()
    ];
  }

  public function getSurvey()
  {
    return (object) [
      'when_reserve' => $this->when_reserve,
      'reasons_for_not_purchase' => $this->reasons_for_not_purchase
    ];
  }

  public function getPersonalInformation()
  {
    return (object) [
      'age' => $this->age,
      'civil_status' => $this->civil_status,
      'occupation' => $this->occupation,
      'current_residence' => $this->current_residence,
      'work_location' => $this->work_location,
      'how_many_guests' => $this->how_many_guests
    ];
  }

  public function getOtherInformation()
  {
    return (object) [
      'purpose_of_visit' => (object) [
        'buyer' => $this->getPurposeOfVisit('buyer'),
        'non_buyer' => $this->getPurposeOfVisit('non_buyer')
      ],
      'source' => $this->source,
      'budget' => $this->budget,
      'projects' => (object) [
        'house_and_lot' => $this->getProjects('house_and_lot'),
        'mid_rise' => $this->getProjects('mid_rise'),
        'high_rise' => $this->getProjects('high_rise')
      ],
      'amenities' => $this->amenities,
    ];
  }

  public function getPurposeOfVisit($type)
  {
    switch ($type) {

      case 'buyer':
      return $this->buyer;
      break;

      # Default to non_buyer
      case 'non_buyer':
      default:
      return $this->non_buyer;
      break;
    }
  }

  public function getProjects($type)
  {
    switch ($type) {

      case 'house_and_lot':
      return $this->house_and_lot;
      break;

      case 'mid_rise':
      return $this->mid_rise;
      break;

      # Default to high_rise
      case 'high_rise':
      default:
      return $this->high_rise;
      break;
    }
  }public function getAllProjects()
  {
    $projects = [];
    $projects[] = $this->options_model->getProjects('house_and_lot');
    $projects[] = $this->options_model->getProjects('mid_rise');
    $projects[] = $this->options_model->getProjects('high_rise');

    $res = array_merge(...$projects); # array unpack operator
    $res = array_unique($res);
    sort($res);
    return $res;
  }


}
