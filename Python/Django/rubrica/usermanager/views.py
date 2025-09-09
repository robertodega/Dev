from django.shortcuts import render
from django.http import JsonResponse
from .models import User

def search(request):
    users = User.objects.all()
    results = [
        {
            'id': user.id, 
            'username': user.username, 
            'email': user.email, 
            'first_name': user.first_name, 
            'last_name': user.last_name, 
            'date_joined': user.date_joined, 
            'is_active': user.is_active
        } 
        for user in users
    ]

    #   return JsonResponse(results)
    return render(request, 'search.html', {'results': results})

def search_with_id(request, id):
    try:
        user = User.objects.get(id=id)
        result = {
            'id': user.id,
            'username': user.username,
            'email': user.email,
            'first_name': user.first_name,
            'last_name': user.last_name,
            'date_joined': user.date_joined,
            'is_active': user.is_active
        }
    except User.DoesNotExist:
        result = {'error': 'User not found'}

    #   return JsonResponse(result)
    return render(request, 'search_user.html', {'results': result})

def add_contact(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        email = request.POST.get('email')
        first_name = request.POST.get('first_name')
        last_name = request.POST.get('last_name')
        date_joined = request.POST.get('date_joined')
        is_active = request.POST.get('is_active')
        user = User(username=username, email=email, first_name=first_name, last_name=last_name)
        user.save()
        return JsonResponse({'status': 'ok'})
    #   return render(request, 'add_contact.html')