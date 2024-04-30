<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-4 mb-5">
                    <div class="row ">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ URL::previous() }}"
                                    class="btn btn-primary btn-sm fs-6"
                                    title="Regresar al Panel">
                                    <i class="fa-solid fa-arrow-left me-1"></i>
                                    Regresar
                                </a>
                                <a class="btn btn-sm btn-success fs-6" data-bs-toggle="modal"
                                    data-bs-target="#nuevoRegistroModal" title="Crear nuevo registro">
                                    <i class="fa-solid fa-plus"></i>
                                    Nuevo
                                </a>                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
