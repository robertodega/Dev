from django.shortcuts import render
from django.http import JsonResponse
from .models import Appointment, Anagrafica
from django.views.decorators.csrf import csrf_exempt

def search_appointment(request):
    appointments = Appointment.objects.all()
    results = [
        {
            'id': appointment.id, 
            'email': appointment.email,
            'first_name': appointment.first_name,
            'last_name': appointment.last_name,
            'reservation_date': appointment.reservation_date, 
            'reservation_hour': appointment.reservation_hour, 
            'created_at': appointment.created_at, 
            'updated_at': appointment.updated_at,
        } 
        for appointment in appointments
    ]

    return render(request, 'search_appointment.html', {'results': results})

def search_appointment_with_id(request, id):
    try:
        appointment = Appointment.objects.get(id=id)
        result = {
            'id': appointment.id, 
            'email': appointment.email,
            'first_name': appointment.first_name,
            'last_name': appointment.last_name,
            'reservation_date': appointment.reservation_date, 
            'reservation_hour': appointment.reservation_hour, 
            'created_at': appointment.created_at, 
            'updated_at': appointment.updated_at,
        }
    except Appointment.DoesNotExist:
        result = {'error': 'Appointment '+str(id)+' not found'}

    return render(request, 'search_appointment_detail.html', {'results': result})

@csrf_exempt
def add_appointment(request):
    if request.method == 'POST':
        email = request.POST.get('email')
        first_name = request.POST.get('first_name')
        last_name = request.POST.get('last_name')
        reservation_date = request.POST.get('reservation_date')
        reservation_hour = request.POST.get('reservation_hour')
        try:
            appointment = Appointment(
                email=email,
                first_name=first_name,
                last_name=last_name,
                reservation_date=reservation_date,
                reservation_hour=reservation_hour,
            )
            appointment.save()
        except Anagrafica.DoesNotExist:
            return JsonResponse({'error': f'Error adding appointment'}, status=404)
        
    try:
        user = Anagrafica.objects.get(email=email)
        print("\n\nPresente in anagrafica\n\n")
    except Anagrafica.DoesNotExist:
        print("\n\nInserimento in anagrafica\n\n")
        user = Anagrafica(
            email=email,
            first_name=first_name,
            last_name=last_name,
            address=request.POST.get('address', ''),
            phone_number=request.POST.get('phone_number', ''),
            date_of_birth=request.POST.get('date_of_birth', None),
        )
        user.save()

    return JsonResponse({'status': 'ok'})
    return render(request, 'add_appointment.html')


def search_anagrafica(request):
    users = Anagrafica.objects.all()
    results = [
        {
            'id': user.id,
            'email': user.email, 
            'first_name': user.first_name, 
            'last_name': user.last_name,
            'is_active': user.is_active,
            'address': user.address,
            'phone_number': user.phone_number,
            'date_of_birth': user.date_of_birth,
        } 
        for user in users
    ]
    return render(request, 'search_anagrafica.html', {'results': results})

def search_anagrafica_with_id(request, id):
    try:
        user = Anagrafica.objects.get(id=id)
        result = {
            'id': user.id,
            'email': user.email, 
            'first_name': user.first_name, 
            'last_name': user.last_name,
            'is_active': user.is_active,
            'address': user.address,
            'phone_number': user.phone_number,
            'date_of_birth': user.date_of_birth,
        }
    except Anagrafica.DoesNotExist:
        result = {'error': 'User '+str(id)+' not found'}

    return render(request, 'search_anagrafica_detail.html', {'results': result})

def add_anagrafica(request):
    if request.method == 'POST':
        email = request.POST.get('email_anagrafica')
        if not email:
            return JsonResponse({'status': 'error', 'message': 'Email is required'}, status=400)
        
        first_name = request.POST.get('first_name')
        last_name = request.POST.get('last_name')
        address = request.POST.get('address')
        phone_number = request.POST.get('phone_number')
        date_of_birth = request.POST.get('date_of_birth')
        
        user = Anagrafica(email=email, first_name=first_name, last_name=last_name, address=address, phone_number=phone_number, date_of_birth=date_of_birth)
        user.save()
        return JsonResponse({'status': 'ok'})
    #   return render(request, 'add_anagrafica.html')
