
XSIS Backend Developer Assessment Test


## API Reference

#### Get all Movies

```http
  GET /api/Movies
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `none` | `none` | not required|

#### Get Specific Movie

```http
  GET /api/Movies/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of Movie to fetch |

### Add New Movie
```http
  POST /api/Movies/
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `image`   | `image`  | **Required**. Image Screen of Movie |
| `Title`   | `string` | Title of the Movie |
| `Description` | `string` |  Description of Movie |
| `Rating` | `float (2,1)` | Riating of Movie |

### Update Movie ID
```http
  PATCH /api/Movies/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `image`   | `image`  | **Required**. Image Screen of Movie |
| `Title`   | `string` | Title of the Movie |
| `Description` | `string` |  Description of Movie |
| `Rating` | `float (2,1)` | Riating of Movie |

### Delete Movie
```http
  DELETE /api/Movies/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `none`   | `none`  | none |


