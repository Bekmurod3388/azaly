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
  <div class="container tabcontent justify-center" id="London">
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
                          <i class="fas fa-tasks cars text-center ml-4 mt-2"></i>


                          <div class="pl-5">
                              <h2>Savdo ro'yxatga olish</h2>
                              <p>Kassirning ish joylari chakana savdo va tovarlarni qaytarish.</p></div>
                      </a>



                  </div>
                  <div class="row pt-2">
                      <a   href="#" class=" d-flex text-black menu ">
                          <i class="fas fa-chart-bar cars text-center ml-4 mt-2"></i>



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
                      bu yerda nima bolishini bilmadm
                  </div>
              </div>

          </div>
      </div>
  </div>
    <div class="container tabcontent justify-center" id="Paris">
        <div class="row pt-2">
            <a   href="{{route('admin.purchases.index')}}" class="col-md-6 d-flex text-black menu ">
                <i class="fa  fa-car cars text-center ml-4 mt-2"></i>


                <div class="pl-5">
                    <h2>Sotib olish</h2>
                    <p>Yetkazib beruvchilardan ish haqi uchun tovarlarni qabul qilishni ro'yxatdan o'tkazish .</p></div>
            </a>


            <a   href="#" class="col-md-6 d-flex text-black menu">
                <i class="fas fa-archive cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Amalga oshirish</h2>
                    <p>Tovarni xaridorga sotish</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu ">
                <i class="fas fa-sync-alt cars ml-4 mt-2 "></i>
                <div class="pl-5">
                    <h2>Yetkazib beruvchiga qaytish</h2>
                    <p>Tovarlarni etkazib beruvchiga qaytarish.</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu ">
                <i class="fas fa-list cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Inventarizatsiya</h2>
                    <p>Haqiqiy inventarizatsiyani dastur ma'lumotlari bilan taqqoslash</p></div>

            </a>
        </div>
        <div class="row pt-2">
            <a   href="#" class="col-md-6 d-flex text-black menu ">
                <i class="fas fa-fax cars text-center ml-3 mt-2"></i>

                <div class="pl-5">
                    <h2>Ko'chirish</h2>
                    <p>Omborlar va do'konlar o'rtasida tovarlarni ko'chirish</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-calculator cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Qayta baholash</h2>
                    <p>Nomenklatutlarning har bir pozitsiyasi uchun o'rtacha vaznning tavsifi</p></div>


            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-archive cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Yozib Olish / Yozish</h2>
                    <p>Hujjatlar yordamida nomenklaturaning joriy sonini sozlash hisobdan chiqarish va kiritish</p></div>

            </a>

        </div>
    </div>
    <div class="container tabcontent" id="german">
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-briefcase cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Ishlar ro'yxati</h2>
                    <p>
                        Nomenklatura ro'yxatini boshqarish va ularning xususiyatlari (narx, shtrix,kodlar va boshqalar)</p></div>
            </a>

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-money-check-alt cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Narxlarning turlari</h2>
                    <p>Narx g'oyasini yaratish va o'zgartirish dasturda yaratilgan</p></div>
            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-file-signature cars text-center ml-3 mt-2"></i>
                <div class="pl-5">
                    <h2>Shartnoma</h2>
                    <p>Yozuv ma'lumotlarini yaratish va o'zgartirish</p></div>
            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-ruler cars text-center ml-3 mt-2"></i>
                <div class="pl-5">
                    <h2>Birliklar</h2>
                    <p>Kulrang sochlarni boshqarish nomenklaturani o'zgartirish yaratish,o'zgartirish, tartibni o'rnatish</p></div>
            </a>
        </div>
        <div class="row pt-2">
            <a   href="{{ route('admin.purchases.index') }}" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-handshake cars text-center ml-2 "></i>
                <div class="pl-5">
                    <h2>Xaridorlar</h2>
                    <p>Xaridor ma'lumotlarini yaratish va o'zgartirish</p></div>
            </a>
            <a   href="{{ route('admin.sizes.index') }}" class="col-md-6 d-flex text-black menu ">
                <i class="fas fa-child cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Hajmi</h2>
                    <p>Bundan tashqari, nomenklaturaning xususiyatlari</p></div>
            </a>

        </div>
        <div class="row pt-4">
            <a   href="{{ route('admin.purchases.index') }}" class="col-md-6 d-flex text-black menu">
                <i class="fab fa-cc-mastercard cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Xaridor kartalari</h2>
                    <p>Diskont,jamg'arma,bonus kartalari va sovg'a sertifikatlarini boshqarish</p></div>
            </a>
            <a   href="{{ route('admin.agent.index') }}" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-people-carry cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Sotuvchilar</h2>
                    <p>Savdo ma'lumotlarini yaratish va o'zgartirish, bonuslarni boshqarish</p></div>
            </a>
        </div>
        <div class="row pt-4">

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-palette cars text-center ml-3 mt-2"></i>
                <div class="pl-5">
                    <h2>Boshqa ma'lumotnomalar</h2>
                    <p>Qo'shimcha ma'lumotnomalar: mamlakatlar, brendlar,ishlab chiqaruvchilar</p></div>
            </a>


    </div>


        </div>
    </div>
    <div class="container tabcontent" id="xitay">
        <div class="row pt-4">

            <a   href="{{ route('admin.warehouses.index') }}" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-warehouse cars text-center ml-4 mt-2"></i>
                <div class="pl-5">
                    <h2>Omborlar va Do'konlar</h2>
                    <p>Obektlarni yaratish va o'zgartirish buxgalteriya hisobi</p></div>

            </a>

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-signal cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Hisobot dizayneri</h2>
                    <p>Do'kon ish haqqi natijalari bo'yicha hisobotlarni yaratish va taqdim etish</p></div>

            </a>
        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-passport cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Kassalar</h2>
                    <p>Kassani yaratish va o'zgartirish.Savdo uskunalari uskunalari joriy kassani sozlash</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-link cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Konfiguratsiya</h2>
                    <p>Dasturning ishlash rejimini belgilaydigan asosiy variantlar</p></div>

            </a>
        </div>

        <div class="row pt-4">

            <a   href="{{ route('admin.roles.index') }}" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-user headset cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Boshqaruv</h2>
                    <p>Korxona hisobvaraqlarida moliyaviy boshqaruv</p></div>

            </a>

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-cogs cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Sozlanmalar</h2>
                    <p>Har bir qurilma uchun noyob sozlamalarni o'rnatish uchun qo'shimcha imkoniyatlar</p></div>

            </a>
        </div>

        <div class="row pt-4">

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-user-friends cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Xodimlar</h2>
                    <p>Dastur foydalanuvchisini moliyaviy boshqarish va ularning kirish grafikasi</p></div>

            </a>

            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-money-check-alt cars text-center ml-2 mt-2"></i>
                <div class="pl-5">
                    <h2>Valyuta kursini belgilang</h2>
                    <p>Qo'shimcha valyuta kursini belgilash</p></div>

            </a>


        </div>
        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-percent cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Aksiyalar</h2>
                    <p>Turli nomenklatura guruhlari uchun chegirmalarni qabul qilish shartlarini yaratish va boshqarish</p></div>

            </a>
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-id-badge cars text-center ml-5 mt-2"></i>
                <div class="pl-5 ml-2">
                    <h2>Litsenziyani boshqarish</h2>
                    <p>Litsenziya ma'lumotlarini ko'rish va o'zgartirish</p></div>

            </a>

        </div>

        <div class="row pt-4">
            <a   href="#" class="col-md-6 d-flex text-black menu p-2">
                <i class="fas fa-gavel cars text-center ml-5 mt-2"></i>
                <div class="pl-5">
                    <h2>Xizmat</h2>
                    <p>Qo'shimcha savdo buxgalteriya xususiyatlari, zaxira ma'lumotlar bazasi</p></div>

            </a>

        </div>
    </div>
</div>



</div>


@endsection
