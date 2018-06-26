<?php

class Options_model extends Crud_model
{

  function __construct()
  {
    parent::__construct();

    # Personal Information stuffs
    $this->age = ['20s', '30s', '40s', '50s', '60s', '70s above'];
    $this->civil_status = ['Single', 'Married', 'Separated/Widow'];
    $this->occupation = ['Self-employed', 'Employed', 'Retired'];
    $this->work_location =
    $this->current_residence =
    ['Nearby (< 30mins away)', 'Medium distance (1/2 to 1 hr away)',
    'Further away (over 1 hr away)'];
    $this->how_many_guests = ['1', '2', '3', '4', '5+'];

    # Survey stuffs
    $this->buyer = ['To view my home',
    'To know the inclusions of my purchase',
    'To get real-time information on the project',
    'To get inspired by interior design of the model units',
    'To get a feel of the environment'];
    $this->non_buyer = ['I plan to purchase an Amaia unit and just need more information',
    'To see whether this would fit my immediate requirements for a home',
    'To get ideas for my future home',
    'Just curious about the new developments in my community'];
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
    $this->when_reserve = ['Within this week',
    'Within a month',
    'Within six months',
    'Within a year'];
  }

  public function all()
  {
    return (object)[
      'personal-information' => $this->getPersonalInformation(),
      'survey' => $this->getSurvey()
    ];
  }

  public function getPersonalInformation()
  {
    return (object) [
      'age' => $this->age,
      'civil-status' => $this->civil_status,
      'occupation' => $this->occupation,
      'current-residence' => $this->current_residence,
      'work-location' => $this->work_location,
      'how-many-guests' => $this->how_many_guests
    ];
  }

  public function getSurvey()
  {
    return (object) [
      'purpose-of-visit' => (object) [
        'buyer' => $this->getPurposeOfVisit('buyer'),
        'non-buyer' => $this->getPurposeOfVisit('non-buyer')
      ],
      'budget' => $this->budget,
      'projects' => (object) [
        'house-and-lot' => $this->getProjects('house-and-lot'),
        'mid-rise' => $this->getProjects('mid-rise'),
        'high-rise' => $this->getProjects('high-rise')
      ],
      'when-reserve' => $this->when_reserve
    ];
  }

  public function getPurposeOfVisit($type)
  {
    switch ($type) {

      case 'buyer':
      return $this->buyer;
      break;

      # Default to non-buyer
      case 'non-buyer':
      default:
      return $this->non_buyer;
      break;
    }
  }

  public function getProjects($type)
  {
    switch ($type) {

      case 'house-and-lot':
      return $this->house_and_lot;
      break;

      case 'mid-rise':
      return $this->mid_rise;
      break;

      # Default to high-rise
      case 'high-rise':
      default:
      return $this->high_rise;
      break;
    }
  }


}
