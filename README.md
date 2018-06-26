
# Amaiashowroom API / Headless CMS
[![Bless](https://cdn.rawgit.com/LunaGao/BlessYourCodeTag/master/tags/sakyamuni.svg)](http://lunagao.github.io/BlessYourCodeTag/)
[![Bless](https://cdn.rawgit.com/LunaGao/BlessYourCodeTag/master/tags/fsm.svg)](http://lunagao.github.io/BlessYourCodeTag/)

## Overview
1. [API Documentation](#api-documentation)
  + Authentication Type
  + Pagination
  + Ordering
1. [API Endpoints](#api-endpoints)

## API documentation
#### API URLs
Development URL: http://amaiashowroom.betaprojex.com/  
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
`GET /options/all`
```json
Status 200 OK
{  
   "personal-information":{  
      "age":[  
         "sample",
         "another",
         "..."
      ],
      "civil-status":[  
         "..."
      ],
      "occupation":[  
         "..."
      ],
      "current-residence":[  
         "..."
      ],
      "work-location":[  
         "..."
      ],
      "how-many-guests":[  
         "..."
      ]
   },
   "survey":{  
      "purpose-of-visit":{  
         "buyer":[  
            "..."
         ],
         "non-buyer":[  
            "..."
         ]
      },
      "budget":[  
         "..."
      ],
      "projects":{  
         "house-and-lot":[  

         ],
         "mid-rise":[  

         ],
         "high-rise":[  

         ]
      },
      "when-reserve":[  

      ]
   }
}
```

#### Personal information

|             Resource           |               Endpoint                 
| ------------------------------ | -------------------------------------------
| **All**                        | `GET /options/personal-info/`              
| **Age**                        | `GET /options/personal-info/age`           
| **Civil status**               | `GET /options/personal-info/civil-status`   
| **Occupation**                 | `GET /options/personal-info/occupation`
| **Current residence**          | `GET /options/personal-info/current-residence`
| **Work location**              | `GET /options/personal-info/work-location`
| **How many guests**            | `GET /options/personal-info/how-many-guests`

#### Survey related
|              Resource                    |               Endpoint                 
| ---------------------------------------- | -------------------------------------------
| **All**                                  | `GET /options/survey/`
| **Purpose of visit (buyer)**             | `GET /options/survey/purpose-of-visit/buyer`
| **Purpose of visit (non-buyer)**         | `GET /options/survey/purpose-of-visit/non-buyer`
| **Budget**                               | `GET /options/budget`
| **Project interested in / Projects**     | `GET /options/survey/projects`
| **House and lot (Projects)**             | `GET /options/survey/projects/house-and-lot`
| **Mid rise (Projects)**                  | `GET /options/survey/projects/mid-rise`
| **High rise (Projects)**                 | `GET /options/survey/projects/high-rise`
| **When do you intend to reserve**        | `GET /options/survey/when-reserve`
