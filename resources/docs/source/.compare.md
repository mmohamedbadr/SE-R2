---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Groups management


APIs for managing Groups
<!-- START_8466a1a91326cd5b6a11d8856aab869d -->
## List Group

To list groups item

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":9,"room_id":"placeat","forever":false,"another_one":535166.9666001,"yet_another_param":{"name":"dolorem"},"even_more_param":[306.108],"book":{"name":"consectetur","author_id":14,"pages_count":14},"ids":[8],"users":[{"first_name":"John","last_name":"Doe"}]}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 9,
    "room_id": "placeat",
    "forever": false,
    "another_one": 535166.9666001,
    "yet_another_param": {
        "name": "dolorem"
    },
    "even_more_param": [
        306.108
    ],
    "book": {
        "name": "consectetur",
        "author_id": 14,
        "pages_count": 14
    },
    "ids": [
        8
    ],
    "users": [
        {
            "first_name": "John",
            "last_name": "Doe"
        }
    ]
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/groups`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the post.
    `lang` |  optional  | The language.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | The id of the user.
        `room_id` | string |  optional  | The id of the room.
        `forever` | boolean |  optional  | Whether to ban the user forever.
        `another_one` | number |  optional  | Just need something here.
        `yet_another_param` | object |  required  | Some object params.
        `yet_another_param.name` | string |  required  | Subkey in the object param.
        `even_more_param` | array |  optional  | Some array params.
        `even_more_param.*` | float |  optional  | Subkey in the array param.
        `book.name` | string |  optional  | 
        `book.author_id` | integer |  optional  | 
        `book[pages_count]` | integer |  optional  | 
        `ids.*` | integer |  optional  | 
        `users.*.first_name` | string |  optional  | The first name of the user.
        `users.*.last_name` | string |  optional  | The last name of the user.
    
<!-- END_8466a1a91326cd5b6a11d8856aab869d -->

<!-- START_922a50d789de16cc2c31d9ae805a7c6b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/groups`


<!-- END_922a50d789de16cc2c31d9ae805a7c6b -->

<!-- START_b68de48ba04936e947d4d2c06bd4b1f5 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/groups/{id}`


<!-- END_b68de48ba04936e947d4d2c06bd4b1f5 -->

<!-- START_6a7b66138fba4574d5e3f634f5beaa09 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/groups/{id}`


<!-- END_6a7b66138fba4574d5e3f634f5beaa09 -->

<!-- START_8745f821d34241afe1048be4d730c78c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/groups/{id}`


<!-- END_8745f821d34241afe1048be4d730c78c -->

#general


<!-- START_8c0e48cd8efa861b308fc45872ff0837 -->
## Login to system .

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/login`


<!-- END_8c0e48cd8efa861b308fc45872ff0837 -->

<!-- START_8ae5d428da27b2b014dc767c2f19a813 -->
## Register to system .

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/register`


<!-- END_8ae5d428da27b2b014dc767c2f19a813 -->

<!-- START_80420c095ed96da032c9eb419d7d6e2d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/categories`


<!-- END_80420c095ed96da032c9eb419d7d6e2d -->

<!-- START_51652a01dd7666395568dd6ba9d67d58 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/categories`


<!-- END_51652a01dd7666395568dd6ba9d67d58 -->

<!-- START_1402ab8abac97e9e61e52a840a1d6700 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/categories/{id}`


<!-- END_1402ab8abac97e9e61e52a840a1d6700 -->

<!-- START_aef4efbda25a96a570c2344147a56259 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/categories/{id}`


<!-- END_aef4efbda25a96a570c2344147a56259 -->

<!-- START_7776be20b10689ca68e4ebe5d47479b0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/categories/{id}`


<!-- END_7776be20b10689ca68e4ebe5d47479b0 -->

<!-- START_fb2ae43e2e99ff4e90f22ba03801a735 -->
## logout from the system .

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/logout`


<!-- END_fb2ae43e2e99ff4e90f22ba03801a735 -->


