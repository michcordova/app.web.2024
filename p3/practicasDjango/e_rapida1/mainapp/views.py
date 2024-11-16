from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html',{
        'title': 'Inicio',
        'content': 'Bienvenido a mi pagina principal'
    })
    
def about(request):
    return render(request, 'mainapp/index.html',{
        'title': 'Acerca de...',
        'content': 'Somos un equipo de desarrollo de software'
    })
    
def mision(request):
    return render(request, 'mainapp/index.html',{
        'title': 'Mision'
    })
    
def vision(request):
    return render(request, 'mainapp/index.html',{
        'title': 'Vision'
    })
