
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
    "personal_information": {
        "age": [
            "20s",
            "30s",
            "40s",
            "50s",
            "60s",
            "70s above"
        ],
        "civil_status": [
            "Single",
            "Married",
            "Separated/Widow"
        ],
        "occupation": [
            "Self-employed",
            "Employed",
            "Retired"
        ],
        "current_residence": [
            "Nearby (< 30mins away)",
            "Medium distance (1/2 to 1 hr away)",
            "Further away (over 1 hr away)"
        ],
        "work_location": [
            "Nearby (< 30mins away)",
            "Medium distance (1/2 to 1 hr away)",
            "Further away (over 1 hr away)"
        ],
        "how_many_guests": [
            "1",
            "2",
            "3",
            "4",
            "5+"
        ]
    },
    "other_information": {
        "purpose_of_visit": {
            "buyer": [
                "To view my home",
                "To know the inclusions of my purchase",
                "To get real-time information on the project",
                "To get inspired by interior design of the model units",
                "To get a feel of the environment",
                "Others"
            ],
            "non_buyer": [
                "I plan to purchase an Amaia unit and just need more information",
                "To see whether this would fit my immediate requirements for a home",
                "To get ideas for my future home",
                "Just curious about the new developments in my community",
                "Others"
            ]
        },
        "source": [
            "Amaia website",
            "Online articles",
            "Blogs",
            "Social media sites (e.g. Facebook)",
            "Property listing (e.g. Property 24)",
            "Recommendations from family or friends",
            "Exhibit/booth at mall or elsewhere",
            "Magazines/newspapers",
            "Billboards, streamers",
            "Flyers, brochures",
            "Saw the actual site",
            "Others"
        ],
        "budget": [
            "Below 1M",
            "1M-1.9M",
            "2M-2.9M",
            "3M-3.9M",
            "4M-4.9M",
            "Above 5M"
        ],
        "projects": {
            "house_and_lot": [
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
            "mid_rise": [
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
            "high_rise": [
                "Amaia Skies Avenida",
                "Amaia Skies Cubao",
                "Amaia Skies Shaw",
                "Amaia Skies Sta. Mesa"
            ]
        },
        "amenities": [
            "Kids Playground",
            "Pocket parks/open spaces",
            "Swimming pool",
            "Clubhouse/function rooms",
            "Basketball court",
            "Soccer field",
            "Volleyball court",
            "Badminton/tennis court",
            "Gym",
            "Retail Shops",
            "Game room",
            "Study hall",
            "Others"
        ],
        "when_reserve": [
            "Within this week",
            "Within a month",
            "Within six months",
            "Within a year",
            "Others"
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


### Sync
#### Sync feedback forms from mobile
`POST /sync/`  
##### Request
**Headers:** `Content-Type: application/json`
```json
{
  "personal_information": {
    "personal_information": {
      "name": "...",
      "gender": "...",
      "age": "...",
      "civil_status": "...",
      "occupation": "...",
      "current_residence": "...",
      "work_location": "...",
      "email_address": "...",
      "mobile_number": "...",
      "how_many_guests": "..."
    },
    "other_information": {
      "is_current_buyer": "...",
      "purpose_of_visit_buyer": "...",
      "purpose_of_visit_non_buyer": "...",
      "source": ["...", "..."],
      "budget": "...",
      "primary_interest": "...",
      "secondary_interest": ["...", "..."],
      "primary_amenities": ["...", "..."],
      "secondary_amenities": ["...", "...", "..."]
    }
  },
  "survey": {
    "buying_experience": {
      "be_knowledge": "...",
      "be_courtesy": "...",
      "be_response": "...",
      "be_appearance": "..."
    },
    "site_visit_experience": {
      "sve_appearance": "...",
      "sve_attractiveness": "...",
      "sve_orderliness": "...",
      "sve_safety": "...",
      "sve_accessibility": "..."
    },
    "showroom_sales_office_model_unit": {
      "ssomu_cleanliness": "...",
      "ssomu_safety": "...",
      "ssomu_completeness": "...",
      "ssomu_accessibility": "...",
      "ssomu_comfort": "..."
    },
    "product": {
      "p_design": "...",
      "p_finishes": "...",
      "p_sizes": "...",
      "p_amenities": "...",
      "p_pricing": "...",
      "p_available": "..."
    },
    "home_buying_decision": {
      "hbd_how": "...",
      "hbd_how_testimonial": "...",
      "hbd_when": "...",
      "hbd_if_not_purchasing": ["...", "..."],
      "hbd_recommend": "...",
      "hbd_recommend_testimonial": "..."
    }
  },
  "meta": {
    "timestamp": 1530006374,
    "showroom": "Amaia Skies Shaw"
  }
}
```

##### Response
```json
Status 201 Created
// todo
```
