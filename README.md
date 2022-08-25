# sister-api
Sistem Informasi Terdistribusi
## Installation

App installation

```bash
  git clone https://github.com/dafidpr/sister-api.git
  cd sister-api
  composer install
  php artisan migrate:fresh --seed
```

After all the setup is complete, run the Android emulator or native device, then run the command:

```bash
  php artisan serve
```

#### API Base URL
Main url of API
```
https://api-sister.herokuapp.com/api/v1/
```

#### Employee Type
Request :
```http
  GET /employee-type
```

Response :
```http
  {
    "headers": {},
    "original": {
        "draw": 0,
        "recordsTotal": 7,
        "recordsFiltered": 7,
        "data": [
            {
                "id": 1,
                "name": "Direktur",
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 2,
                "name": "Teknisi",
                "created_at": null,
                "updated_at": null
            },
        ],
        "input": {
            "name": "asd"
        }
    },
    "exception": null
}
```

#### Employee Type Detail
Request :
```http
  GET /{id}/employee-type
```

Response :
```http
{
    "status": true,
    "data": {
        "id": 7,
        "name": "asd",
        "created_at": null,
        "updated_at": "2022-08-24T07:57:45.000000Z"
    }
}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `bigint` | **Optional**. ID Employee Type |

#### Store Employee Type
Request :
```http
  POST /employee-type
```
```http
 {
    "name": "Wakil Direktur"
 }
```

Response :
```http
{
    "status": true,
    "message": "Berhasil menambahkan data",
    "data": {
        "name": "Wakil Direktur",
        "updated_at": "2022-08-24T08:34:40.000000Z",
        "created_at": "2022-08-24T08:34:40.000000Z",
        "id": 8
    }
}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. Name empployee type |


#### Update Employee Type
Request : 
```http
  PATCH /{id}/employee-type
```
```http
 {
    "name": "Wakil Direktur"
 }
```

Response : 
```http
{
    "status": true,
    "message": "Berhasil merubah data"
}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. ID Employee Type |


#### Delete Employee Type
Request :
```http
  DELETE /{id}/employee-type
```

Response :
```http
{
    "status": true,
    "data": "Berhasil menghapus data"
}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. ID Employee Type |

