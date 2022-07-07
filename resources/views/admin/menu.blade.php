@extends('admin.master')
@section('content')

<div class="container w-70  %">
<div class="row ">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
{{--            <a class="navbar-brand " href="#">Bolimlar</a>--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100 tab ">
                    <button class=" w-20 active tablinks" onclick="openCity(event, 'London')">Sotish</button>
                    <button class="w-20 active tablinks" onclick="openCity(event, 'Paris')" >Ombor operatsiyalari</button>
                    <button class=" w-20 active tablinks" onclick="openCity(event, 'german')" >ma'lumotnoma</button>
                    <button class=" active tablinks" onclick="openCity(event, 'xitay')">Ma'muriyat</button>
                         </div>
            </div>
        </div>
    </nav>
  <div class="container tabcontent" id="London">
      <div class="row">
          <div class="col-md-6">
              <div class="text-black ">
                  <div class="row pt-2">
                      <a   href="#" class=" d-flex text-black menu ">
                          <i class="fas fa-money-check-alt cars text-center ml-2 mt-2"></i>


                          <div class="pl-5">
                              <h2>Naqd pul almashtirish</h2>
                              <p>Naqd smenalarni boshqarish.Deraza uchun statistikani ko'rish</p></div>
                      </a>



                  </div>
                  <div class="row pt-2">
                      <a   href="#" class=" d-flex text-black menu ">
                          <i class="fas fa-tasks cars text-center ml-2 mt-2"></i>


                          <div class="pl-5">
                              <h2>Savdo ro'yxatga olish</h2>
                              <p>Kassirning ish joylari chakana savdo va tovarlarni qaytarish.</p></div>
                      </a>



                  </div>
                  <div class="row pt-2">
                      <a   href="#" class=" d-flex text-black menu ">
                          <i class="fas fa-chart-bar cars text-center ml-2 mt-2"></i>


                          <div class="pl-5">
                              <h2>Kassa hisoboti</h2>
                              <p>Sotilgan tovarlar ro'yxatini ko'rish.Kassaning moliyaviy natijalari</p></div>
                      </a>



                  </div>
              </div>

          </div>
          <div class="col-md-6">
              <div class="d-flex text-black ">
                  <div class="border w-100 p-2  h-100 d-flex">
                      dsfer
                  </div>
              </div>

          </div>
      </div>
  </div>
    <div class="container tabcontent" id="Paris">
        <div class="row pt-2">
            <a   href="#" class="col-md-6 d-flex text-black menu ">
                <i class="fa  fa-car cars text-center ml-2 mt-2"></i>


                <div class="pl-5">
                    <h2>Sotib olish</h2>
                    <p>Yetkazib beruvchilardan ish haqi uchun tovarlarni qabul qilishni ro'yxatdan o'tkazish .</p></div>
            </a>


            <a   href="#" class="col-md-6 d-flex text-black menu">
                <i class="fas fa-archive cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>tovarni xaridorga sotish</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-sync-alt cars ml-2 mt-2 "></i>
                <div class="pl-5">
                    <h2>Yetkazib beruvchiga qaytish</h2>
                    <p>Tovarlarni etkazib beruvchiga qaytarish.</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-list cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Inventarizatsiya</h2>
                    <p>Haqiqiy inventarizatsiyani dastur ma'lumotlari bilan taqqoslash</p></div>

            </a>
        </div>
        <div class="row pt-2">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-fax cars text-center ml-2 mt-2"></i>

                <div class="pl-5">
                    <h2>ko'chirish</h2>
                    <p>Omborlar va do'konlar o'rtasida tovarlarni ko'chirish</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-calculator cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Qayta baholash</h2>
                    <p>Nomenklatutlarning har bir pozitsiyasi uchun o'rtacha vaznning tavsifi</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-archive cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Yozib Olish / Yozish</h2>
                    <p>Hujjatlar yordamida nomenklaturaning joriy sonini sozlash hisobdan chiqarish va kiritish</p></div>

            </a>

        </div>
    </div>
    <div class="container tabcontent" id="german">
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>


            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
        </div>
        <div class="row pt-5">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>

        </div>
    </div>
    <div class="container tabcontent" id="xitay">
        <div class="row pt-4">

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <img  class="cars" src="{{asset('assets/img/icons/index.png')}}" >
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarlarni sotish...</p></div>

            </a>
        </div>

        <div class="row pt-4">


        </div>
    </div>
</div>



</div>


@endsection
