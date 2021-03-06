
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
        1. [Password](#password)
    1. [Showrooms](#showrooms)
    1. [Sync](#sync)
    2. [Success](#thankyou)

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
            "5+",
            "None"
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
                "I have decided to purchase an Amaia unit",
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
        ]
    },
    "survey": {
        "when_reserve": [
            "Within this week",
            "Within a month",
            "Within six months",
            "Within a year",
            "Others"
        ],
        "reasons_for_not_purchase": [
            "Location of the site (accessibility, safety)",
            "Orderliness of the site (entrance, main area)",
            "Design of the units",
            "Finishing of the units",
            "Amenities",
            "Condition of model units",
            "Condition of showroom/sales office",
            "Units are too small",
            "Units are too big",
            "Cannot afford price/monthly amortization",
            "Did not reflect description in ad",
            "Seller was not responsive",
            "Negative feedback from friends/family",
            "Preference for another development",
            "Undecided/unready to purchase a home",
            "Others"
        ]
    }
}
```
### Password
#### Compare server-side stored admin password with the requested password
`POST /options/password/`  

##### Parameters

|       Key          |       Data type      |       Example      
| :----------------: | :------------------: | :--------------------:
|     password       |        String        | supersecretpassword
##### Success
```json
Status: 200 OK
{
    "message": "Password matched",
    "code": "password_matched"
}
```
##### Failure
```json
Status: 200 OK
{
    "message": "Password mismatch",
    "code": "password_mismatch"
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
      "specific_occupation": "...",
      "current_residence": "...",
      "specific_residence": "...",
      "work_location": "...",
      "specific_work_location": "...",
      "email_address": "...",
      "mobile_number": "...",
      "how_many_guests": "..."
    },
    "other_information": {
      "is_current_buyer": "..."
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
      "hbd_source":"...",
      "hbd_budget":"...",
      "hbd_primary_interest":"...",
      "hbd_secondary_interest":"...",
      "hbd_primary_amenities":"...",
      "hbd_secondary_amenities":"...",
      "hbd_recommend": "...",
      "hbd_recommend_testimonial": "..."
    }
  },
  "meta": {
    "timestamp": 1530006374,
    "showroom": "Amaia Skies Shaw",
    "survey_start": 1530006375,
    "survey_end": 1530006376,
    "generated_code": "somesupersecretcode"
  }
}
```

If survey_by_email field is present in the meta object, the user will receive an email notification for the web version of the survey.
```json
"meta": {
    "survey_by_email": true
}
```

##### Response
```json
Status 201 Created
{
    "id": "1",
    "timestamp": "1530006374",
    "personal_information_id": "1",
    "survey_id": "1",
    "showroom": "Amaia Skies Shaw",
    "created_at": "2018-06-26 22:36:21",
    "updated_at": "0000-00-00 00:00:00"
}
```
####thankyou
### Survey Success message
`GET /thankyou`

##### Response
```json
Status 200 
{
    "heading": "Thank you!",
    "body": "You have finished the survey."
}
```


### Web survey TODOs

- [X] Update table structure to handle yung email token  
- [X] Email user with query string base64 encoded `survey/?t=SQzxWbxjywusjgs`  
- [X] Setup Email  
- [X] Email template  
- [ ] Cookies or LocalStorage API  
- [X] Try POST request in JS/client-side/server-side  
- [X] Try authentication headers  
- [X] Try update user  
- [X] Gawin yung buong front-end  
- [X] Diskarte sa multiple forms  
- [X] Integrate HTML  
- [X] Tests / Required fields IE 11 etc  
- [X] Thank you page  
- [X] 404 the old email if tried to access again  
