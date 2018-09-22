# Api rest example

# Methods
### Get /api/users
Will return all users, using a pagination of 3 user per page

### Get /api/users/id
Where id param is an integer, the api will return data in this format of the matched user

```
{
    "data": {
        "id": 2,
        "first_name": "kevin",
        "last_name": "herrera vega",
        "avatar": "https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg"
    }
}
```

### Post /api/users
We need to provide the following params under x-www-form-unlencoded, the api will create a new user
- nombre
- apellidopat
- apellidomat
- email
- fchnac
- fchingreso

and will return data in this format
```
{
    "nombre": "kevin",
    "apellidopat": "herrera",
    "apellidomat": "vega",
    "email": "kevinmike94@gmail.com",
    "fchnac": "22/08/1994",
    "fchingreso": "01/01/2018",
    "id": 2,
    "createdAt": "2018-09-22 19:14:34"
}
```
### Put /api/users/id
Where id param is an integer, the api will update the user that match with this id.
We need to provide the following params under x-www-form-unlencoded
- nombre
- apellidopat
- apellidomat
- email
- fchnac
- fchingreso

Thi api will return
```
{
    "nombre": "kevin",
    "apellidopat": "herrera",
    "apellidomat": "vega",
    "email": "kevinmike94@gmail.com",
    "fchnac": "22/08/1994",
    "fchingreso": "01/01/2018",
    "id": 2,
    "createdAt": "2018-09-22 19:14:34"
}
```

### Delete /api/users/id
Where id param is an integer, the api will delete the user that matchs with this id