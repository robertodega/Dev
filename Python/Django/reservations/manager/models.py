from django.db import models

class Appointment(models.Model):
    id = models.AutoField(primary_key=True)
    email = models.EmailField(null=False)
    first_name = models.CharField(max_length=30, null=True, blank=True)
    last_name = models.CharField(max_length=30, null=True, blank=True)
    reservation_date = models.DateTimeField()
    reservation_hour = models.TimeField(null=True, blank=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    def __str__(self):
        return f"Appointment {self.id} for {self.email}"
    
class Anagrafica(models.Model):
    id = models.AutoField(primary_key=True)
    #   appointment = models.OneToOneField(Appointment, on_delete=models.CASCADE)
    email = models.EmailField(unique=True)
    first_name = models.CharField(max_length=30, null=True, blank=True)
    last_name = models.CharField(max_length=30, null=True, blank=True)
    is_active = models.BooleanField(default=True)
    address = models.CharField(max_length=255, null=True, blank=True)
    phone_number = models.CharField(max_length=15, null=True, blank=True)
    date_of_birth = models.DateField(null=True, blank=True)
    
    def __str__(self):
        return f"Anagrafica for Appointment {self.appointment.id}"
