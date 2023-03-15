
# Unilimes Task
I am using Laravel 10.x version,that`s why 
use latest version of Php

Starting Commands:
1) composer install & composer update
2) sail up -d
3) sail artisan migrate 


# Project consists of 2 part:
1) Storing Csv, Xlsx, Txt File which I have used dataset.txt
2) Rest Index Api which is involving filter querys and paginations

## --now you can see everything--







## API Reference

#### Dataset uploading endpoint

```http
  POST /api/dataset/store
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `uploaded_file` | `file` | **Required**. Txt, Xlsx, Csv |
| `Accept` | `string` | **Required**. Your Application/json |
| 


#### Filtering and Displaying all DataSets

```http
  GET /api/dataset
  GET /api/dataset?firstname=something
  GET /api/dataset?lastname=something
  GET /api/dataset?category=something
  GET /api/dataset?email=something
  GET /api/dataset?gender=maleOrFemale
  GET /api/dataset?birthDate=1997-02-06
  GET /api/dataset?age=20
  GET /api/dataset?first_age=20&second_age=25
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
`firstname`             | `string` | **Required**. Firstname of User |
| `lastname`               | `string` | **Required**. Surname of User |
| `category`               | `string` | **Required**. Category of favourite toys |
| `email`               | `string` | **Required**. Email of user |
| `gender`               | `string` | **Required**. Gender of User |
| `birthDate`               | `date` | **Required**. Birth date of User |
| `age`               | `numeric` | **Required**. Age of User |
| `first_age`               | `numeric` | **Required**. First age of age Range |
| `second_age`               | `numeric` | **Required**. Second Age of age Range |

#### You can send the params at the same time
