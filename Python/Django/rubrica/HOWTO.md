

#   Progect creation

- mkdir rubrica
- cd rubrica
- python3 -m venv venv

#   Project activation

- source venv/bin/activate
- pip install django
- pip install djangorestframework
- django-admin startproject rubrica .
- django-admin startapp usermanager
- python3 manage.py migrate
- python3 manage.py createsuperuser
- python3 manage.py runserver

#   Project population

- mkdir static static/css static/js templates
- touch static/css/custom.css static/js/custom.js templates/main.html

#   Project files update

<u>in <strong>/rubrica/urls.py</strong></u>

    from django.contrib import admin
    from django.urls import path, include
    from django.views.generic.base import TemplateView

    urlpatterns = [
        path('admin/', admin.site.urls),
        path('accounts/', include('django.contrib.auth.urls')),
        path("", TemplateView.as_view(template_name="main.html"), name="main"),
        path('search/', views.search, name='search'),
    ]

<u>in <strong>/rubrica/settings.py</strong></u>

    ...

    INSTALLED_APPS = [
        ...
        'rest_framework',
        'usermanager',
    ]

    ...

    TEMPLATES = [
        {   
            ...
            'DIRS': [BASE_DIR / "templates"],
            ...

        ...

    STATICFILES_DIRS = [
        BASE_DIR / "static",
    ]

    ...

    LOGIN_REDIRECT_URL = "main"
    LOGOUT_REDIRECT_URL = "main"

<br /><br /><u>edit /templates/main.html </u>

    {% load static %}
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Python Django rubrica</title>
            <link rel="stylesheet" href="{% static 'css/custom.css'%}" />

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
            
        </head>
        <body>
            <h1>Python Django rubrica</h1>
        </body>
    </html>

    <script src="{% static 'js/custom.js'%}"></script>

- <u>edit static/css/custom.css</u>
- <u>edit static/js/custom.js</u>


<br /><br /><u>edit /usermanager/views.py </u>

    from django.shortcuts import render
    from django.http import JsonResponse
    from .models import User

    def search(request):
        query = request.GET.get('q', '')
        if query:
            users = User.objects.filter(name__icontains=query)
            results = [{'id': user.id, 'name': user.name} for user in users]
        else:
            results = []
        return JsonResponse({'results': results})

<br /><br /><u>edit /usermanager/models.py </u>

    from django.db import models

    class User(models.Model):
        username = models.CharField(max_length=150, unique=True)
        email = models.EmailField(unique=True)
        first_name = models.CharField(max_length=30)
        last_name = models.CharField(max_length=30)
        date_joined = models.DateTimeField(auto_now_add=True)
        is_active = models.BooleanField(default=True)

        def __str__(self):
            return self.username

- cd/rubrica
- python3 manage.py makemigrations
- python3 manage.py migrate

#   functionality updates

<u>in <strong>/rubrica/urls.py</strong></u>

    path('search/', views.search, name='search'),
    path('search/<int:id>/', views.search_with_id, name='search_with_id'),
    path('add_contact/', views.add_contact, name='add_contact'),

<br /><br /><u>edit /usermanager/views.py </u>

    def search(request):
    def search_with_id(request, id):
    def add_contact(request):

#   Project RUN

- source venv/bin/activate
- python3 manage.py runserver

