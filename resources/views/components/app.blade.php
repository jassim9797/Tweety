<x-master>
    
    <main class="container mx-auto lg:flex" >

        <section class="lg:w-1/6"> 
            @include('_sidebar-links')     
        </section>

        <section class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            {{$slot}}
        </section>
                
        <section class="lg:w-1/6 ">
            <div  class="bg-blue-100 rounded-lg p-4">
              @include('_friends-list')     
            </div>
              
        </section>
            
    </main>
        
</x-master>