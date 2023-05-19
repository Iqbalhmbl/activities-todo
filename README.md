# Activities - TODO

# Activities API
```bash
1. Get all activities data
GET http://127.0.0.1:8000/api/activities-items

2. Get one activity data by ID
GET http://127.0.0.1:8000/api/activities-items/1

3. Add new activity data

{
    "title": "Kerja",
    "email": "udum@gmail.com"
}

POST http://127.0.0.1:8000/api/activities-items/create

4. Update activity data by ID

{
    "title": "Test"
}

PATCH http://127.0.0.1:8000/api/activities-items/update/1

5. Delete activity data by ID
DELETE http://127.0.0.1:8000/api/activities-items/delete/2
```

# Todos API
```bash
1. Get all todos data by activity group ID
GET http://127.0.0.1:8000/api/todo-items?activity_group_id=2

2. Get one todo data by ID
GET http://127.0.0.1:8000/api/todo-items/5

3. Add new todo data

{
    "title": "Work",
    "activity_group_id": "2"
    "priority": "High"
}

POST http://127.0.0.1:8000/api/todo-items/create

4. Update todo data by ID

{
    "priority": "Very-High"
}

PATCH http://127.0.0.1:8000/api/todo-items/update/5

5. Delete todo data by ID
DELETE http://127.0.0.1:8000/api/todo-items/delete/5

tencu yuhu
```
