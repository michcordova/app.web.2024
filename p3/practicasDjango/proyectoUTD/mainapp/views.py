from django.shortcuts import render

# Create your views here.


def index(request):
    return render(request, 'mainapp/index.html',{
        'title': 'Inicio | Pagina Prinicipal',
        'content': 'Bienvenido a mi pagina principal'
    })
    
def about(request):
    return render(request, 'mainapp/about.html',{
        'title': 'Acerca de ',
        'content': 'Somos un equipo de Desarrollo de Software con Django'
    })
    
def mision(request):
    return render(request, 'mainapp/mision.html',{
        'title': 'Mission',
        'content': 'Somos un equipo de Desarrollo de Software con Django'
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html',{
        'title': 'Visión',
        'content': 'Somos un equipo de Desarrollo de Software con Django'
    })
    
