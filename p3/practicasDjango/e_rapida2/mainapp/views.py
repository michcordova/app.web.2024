from django.shortcuts import render

# Create your views here.
def index(requests):
    return render(requests, 'mainapp/index.html', {
        'title':'Inicio | Página principal',
        'content':'Bienvenido a mi página principal!'
    })

def about(requests):
    return render(requests, 'mainapp/about.html', {
        'title':'Acerca de',
 
    })

def mision(requests):
    return render(requests, 'mainapp/mision.html', {
        'title':'Misión',
       
    })

def vision(requests):
    return render(requests, 'mainapp/vision.html', {
        'title':'Visión',
     
    })

def registro(requests):
    return render(requests, 'mainapp/registro.html', {
        'title':'Registro',
       
    })

def iniciosesion(requests):
    return render(requests, 'mainapp/iniciosesion.html', {
        'title':'Inicio de Sesión',
        
    })

def error_404(request, exception):
    return render(request, 'mainapp/error404.html', status=404)