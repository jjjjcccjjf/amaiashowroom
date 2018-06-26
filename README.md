
# Amaiashowroom API / Headless CMS
[![Bless](https://cdn.rawgit.com/LunaGao/BlessYourCodeTag/master/tags/sakyamuni.svg)](http://lunagao.github.io/BlessYourCodeTag/)
[![Bless](https://cdn.rawgit.com/LunaGao/BlessYourCodeTag/master/tags/fsm.svg)](http://lunagao.github.io/BlessYourCodeTag/)

## Overview
1. [API Documentation](#api-documentation)
  1. Authentication Type
  1. Pagination
  1. Ordering
1. [API Endpoints](#api-endpoints)
  1. [Options](#options)
  1. [Showrooms](#showrooms)
  1. [Sync](#sync)

## API documentation
#### API URLs
Development URL: http://amaiashowroom.betaprojex.com/api/  
Production URL: tbd

####   Authentication Type
+ Basic Auth

#### Pagination
* tbd

#### Ordering
* tbd

## API Endpoints

### Options
#### List all options
`GET /options/` or  
`GET /options/all` *(alias)*
```json
Status 200 OK
{
  "personal-information": {
    "age": [
      "20s",
      "30s",
      "40s",
      "50s",
      "60s",
      "70s above"
    ],
    "civil-status": [
      "Single",
      "Married",
      "Separated/Widow"
    ],
    "occupation": [
      "Self-employed",
      "Employed",
      "Retired"
    ],
    "current-residence": [
      "Nearby (< 30mins away)",
      "Medium distance (1/2 to 1 hr away)",
      "Further away (over 1 hr away)"
    ],
    "work-location": [
      "Nearby (< 30mins away)",
      "Medium distance (1/2 to 1 hr away)",
      "Further away (over 1 hr away)"
    ],
    "how-many-guests": [
      "1",
      "2",
      "3",
      "4",
      "5+"
    ]
  },
  "survey": {
    "purpose-of-visit": {
      "buyer": [
        "To view my home",
        "To know the inclusions of my purchase",
        "To get real-time information on the project",
        "To get inspired by interior design of the model units",
        "To get a feel of the environment"
      ],
      "non-buyer": [
        "I plan to purchase an Amaia unit and just need more information",
        "To see whether this would fit my immediate requirements for a home",
        "To get ideas for my future home",
        "Just curious about the new developments in my community"
      ]
    },
    "budget": [
      "Below 1M",
      "1M-1.9M",
      "2M-2.9M",
      "3M-3.9M",
      "4M-4.9M",
      "Above 5M"
    ],
    "projects": {
      "house-and-lot": [
        "Amaia Scapes Bauan",
        "Amaia Scapes Bulacan",
        "Amaia Scapes Cabanatuan",
        "Amaia Scapes Cabuyao",
        "Amaia Scapes Capas",
        "Amaia Scapes General Trias",
        "Amaia Scapes Iloilo",
        "Amaia Scapes Lucena",
        "Amaia Scapes North Point",
        "Amaia Scapes Pampanga",
        "Amaia Scapes San Fernando",
        "Amaia Scapes San Pablo",
        "Amaia Scapes Trece Martires",
        "Amaia Scapes Urdaneta",
        "Amaia Series Novaliches (townhouse)",
        "Amaia Square Novaliches (shophouse)"
      ],
      "mid-rise": [
        "Amaia Steps Alabang",
        "Amaia Steps Altaraza",
        "Amaia Steps Bicutan",
        "Amaia Steps Capitol Central",
        "Amaia Steps Mandaue",
        "Amaia Steps Novaliches",
        "Amaia Steps Nuvali",
        "Amaia Steps Parkway Nuvali",
        "Amaia Steps Pasig",
        "Amaia Steps Sucat"
      ],
      "high-rise": [
        "Amaia Skies Avenida",
        "Amaia Skies Cubao",
        "Amaia Skies Shaw",
        "Amaia Skies Sta. Mesa"
      ]
    },
    "when-reserve": [
      "Within this week",
      "Within a month",
      "Within six months",
      "Within a year"
    ]
  }
}
```

### Showrooms
#### List all showrooms
`GET /showrooms/`
```json
Status 200 OK
[
  "Amaia Scapes Bauan",
  "Amaia Scapes Bulacan",
  "Amaia Scapes Cabanatuan",
  "Amaia Scapes Cabuyao",
  "Amaia Scapes Capas",
  "Amaia Scapes General Trias",
  "Amaia Scapes Iloilo",
  "Amaia Scapes Lucena",
  "Amaia Scapes North Point",
  "Amaia Scapes Pampanga",
  "Amaia Scapes San Fernando",
  "Amaia Scapes San Pablo",
  "Amaia Scapes Trece Martires",
  "Amaia Scapes Urdaneta",
  "Amaia Series Novaliches (townhouse)",
  "Amaia Skies Avenida",
  "Amaia Skies Cubao",
  "Amaia Skies Shaw",
  "Amaia Skies Sta. Mesa",
  "Amaia Square Novaliches (shophouse)"
]
```
