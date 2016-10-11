
<?php
session_start();
include_once '../settings.php';
mysql_connect(host, user, password);
mysql_select_db(db);
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';");
load();
inseptionrequest();
?>

<div class="b-popup-content" style="width: 60%">
    <div class="title">
        <div class = "cl"><i class="fa fa-close" onclick="pophide('#popup1');"></i></div>
    </div>
    <br><br>
    <div class="help">
        <div class="conteiner">
            <div class="tableContents">
                <div class="listTableContent">
                    <div class="itemTableContent chapterMain" id="chapter1">Тема 1</div>
                    <div class="itemTableContent chapterAttach" id="chapter1">Подтема 1</div>
                    
                </div>
            </div>
            <div class="mainContent">
                <div class="chapter chMain" id="chapter1">
                    <div class="titleMainContent">Как начать работу</div>
                    <div class="textMainContent">
                       
                        Пережде чем начать работу с сайтом пожалуйста ознакомтесь с данной инструкцией, в ней коротко описано что нужно делать, чтобы начать работы и какие возможности есть на сайте.

                    </div>  
                </div>
                
                <div class="chapter chAttach" id="chapter2">
                    <div class="titleMainContent">Создать группу</div>
                    <div class="textMainContent">
                       
                       Создайте одну или несколько групп, в них будут хранится ссылки, которые вы будете проверять. <br><b>Нажимет на "+"!</b><br><img src='addgroupgif.gif' style='width: 100%;'>
                       
                    </div>
                </div>
                                
                <div class="chapter chAttach" id="chapter3">
                    <div class="titleMainContent">Добавить сайт</div>
                    <div class="textMainContent">

                        Добавьте ссылку на то, что хотите отслеживать в группу. <br><b>Нажимет на "+"!</b><br><img src='addgroupgif.gif' style='width: 100%;'><br>
                        
                        Перейдём непосредственно к самому добавлению. <br><img src='addgroupform.png' style='width: 100%;'><br>
                        
                        Заполните поле <b>"Ссылка"</b> угадайте чем. <br><img src='addgrouplink.gif' style='width: 100%;'><br>
                        
                        Выберите подходящий <b>шаблон</b>, если это не произошло автоматически. Описание всех шаблонах обязательно прочитайте (<b><a href="">тут</a></b>)<br><img src='addgrouptamplete.gif' style='width: 100%;'><br>
                        
                        Добавьте постер, если он не добавляется автоматически с сайта (<b><a href="">опять же читайте описание шаблонов</a></b>).<br><img src='addgroupposter.gif' style='width: 100%;'><br>
                       
                        <br><b>Поля "Название" и "Сколько сейчас" заполнять не обязательно, если выбранный шаблон может их достать сам</b><br><br>
                        
                        В поле "Дополнительная ссылка" можно вставить ссылку, которая будет открыватся при клике на постер, если таковая имеется. <br><img src='addgroupposter.gif' style='width: 100%;'><br>
                        
                        <br><img src='addgroupposter.gif' style='width: 100%;'><br>              
                    </div>
                </div>
                
                <div class="chapter chAttach" id="chapter4">
                    <div class="titleMainContent">Шаблоны</div>
                    <div class="textMainContent">
                        Пояснение:<br>
                        <b>"Анализирует:"</b> означает, что при проверки на обновления он ореинтируется на указанную строку.<br>
                        <b>"Постер:"</b> говорит добавляет ли он постер с сайта автоматически. <br>
                        <b>"Название:"</b> говорит добавли он название с сайта автоматически.<br>
                       
                        <div class="templateItem-">
                            <div class="templateTitle">tr.anidub.com</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: Заголовок страниц конкретного аниме.
                                    <br>Постер: Да.
                                    <br>Название: Да.
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">animevost.org</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности: 
                                    <br>Анализирует: Заголовок страниц у тайтлов 
                                    <br>Постер: Да.
                                    <br>Название: Да.
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">online.anidub.com</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: Заголовок страниц у тайтлов 
                                    <br>Постер: Да.
                                    <br>Название: Да.
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">vk.com/video</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: Количество видеозаписей
                                    <br>Постер: Нет.
                                    <br>Название: Да.
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">anistar.ru</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">aniplay.tv</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">mintmanga.com</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">readmanga.me</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">readmanga.today</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">lostfilm.tv</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>
                            <div class="templateImage"></div>
                        </div>
                        <div class="templateItem-">
                            <div class="templateTitle">youtube.com</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>
                           <div class="templateImage"></div>
                        </div>
                        <div class="templateItem-">
                            <div class="templateTitle">lostfilm.tv</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>
                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">youtube.com</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">anilibria.tv</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">newstudio.tv</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">stopgame.ru</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        
                        <div class="templateItem-">
                            <div class="templateTitle">carambatv.ru</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                         
                        <div class="templateItem-">
                            <div class="templateTitle">readcomics.me</div><br>
                            <div class="flexbox">
                                <div class="templatePoster"><img src="23"></div>
                                <div class="templateContent">
                                    Возможности:
                                    <br>Анализирует: 
                                    <br>Постер: 
                                    <br>Название: 
                                </div>                               
                            </div>

                            <div class="templateImage"></div>
                        </div>
                        

                    </div>  
                </div>
                
                <div class="chapter chMain" id="chapter5">
                    <div class="titleMainContent">Обновление</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>                
                
                <div class="chapter chMain" id="chapter6">
                    <div class="titleMainContent">Режимы</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>
                                
                <div class="chapter chAttach" id="chapter7">
                    <div class="titleMainContent">Обычный</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>
                                                  
                <div class="chapter chAttach" id="chapter8">
                    <div class="titleMainContent">Расширенный</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>
                         
                <div class="chapter chMain" id="chapter9">
                    <div class="titleMainContent">Уведомления</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>
                
                 <div class="chapter chMain" id="chapter10">
                    <div class="titleMainContent">Дополнительно</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptatum, magnam. Fuga, saepe nam. Ratione doloremque officia tenetur delectus, numquam. Ipsum minima, nihil, minus temporibus odit enim repudiandae nobis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit at, voluptatibus voluptates laudantium nesciunt inventore aliquid rem pariatur ullam eveniet dicta placeat praesentium asperiores voluptate perspiciatis veniam corporis doloremque magnam facilis quia. Laborum cum inventore dolor labore obcaecati aspernatur quis! Temporibus rerum dolore cupiditate, quas nobis maxime fugiat sint, exercitationem deleniti quos ad dolor sequi, ab recusandae. Doloremque, maiores molestiae blanditiis. Deleniti dolorem neque corporis ipsum, dicta tempora sapiente, ipsa sint cupiditate provident dignissimos. Fugiat natus officia rem saepe beatae iusto quam consequatur voluptas eveniet dolore itaque eaque mollitia rerum nihil, atque enim reprehenderit autem alias adipisci repellat delectus hic, aperiam obcaecati unde. In delectus deserunt molestias perspiciatis! Fugiat dignissimos, nesciunt repellat, beatae, minima culpa quis autem a eligendi pariatur ipsum laboriosam aliquam odio. Voluptates ipsum, corporis architecto et incidunt repellat sed, est deserunt quas sint aut quaerat recusandae. Sed, velit hic asperiores incidunt nostrum corporis quia, veniam unde. Assumenda itaque, sequi quibusdam eum est aperiam voluptates expedita debitis quasi. Perspiciatis omnis, ullam explicabo nostrum, commodi alias doloribus. Mollitia quae, recusandae nisi eos, praesentium corporis non, itaque accusantium, velit magni quam quasi! Dignissimos esse quibusdam, excepturi sed illum quod natus facilis recusandae delectus optio, dolore cum, pariatur modi earum maxime.

                    </div>  
                </div>
                           
                 <div class="chapter chAttach" id="chapter11">
                    <div class="titleMainContent">Кастомизация</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit fugit molestiae suscipit ipsum atque repudiandae assumenda ut, mollitia sint quod magnam, nam dolor sit maxime necessitatibus quam. Magnam accusamus architecto quo aperiam dolores nemo obcaecati illum, cumque, aliquam libero et reprehenderit, enim quidem sed voluptate sequi numquam! Iusto nihil modi voluptatum ut quos consequatur consectetur nam perspiciatis repellat nobis. Quaerat suscipit aspernatur amet placeat impedit explicabo culpa vero molestias non. Doloremque eveniet assumenda vitae maiores, ex corporis laboriosam eum impedit architecto aliquid ducimus officia id expedita obcaecati quae in tempora quibusdam totam, minima velit non veritatis, iste mollitia ipsam? Et sint reiciendis facilis nostrum repellat veritatis dolorem accusamus deserunt, eum, illo quas iste ipsum nulla nisi tenetur, laudantium debitis enim. A alias expedita adipisci sed facere voluptas rem, porro nihil corporis distinctio repellendus vitae tempore totam ad laboriosam commodi culpa temporibus. Cumque minima aspernatur explicabo aperiam assumenda nemo officiis! Velit sapiente, accusantium eius delectus iusto, distinctio impedit perferendis corporis. Aut corporis optio voluptatum voluptas, voluptatibus quo, quae cupiditate pariatur qui vero quod ex. Nam numquam, dolorum ipsam voluptate aut ad dignissimos, sequi repudiandae hic. Ut voluptatum rem commodi aliquam saepe cumque, repellat nobis eaque maiores eum maxime ex voluptatibus esse consequuntur voluptatem architecto autem ducimus quisquam laboriosam cum quis vel quae impedit suscipit? Aspernatur unde, tempore modi! Vel reiciendis doloribus accusamus odio est officia at amet ipsum illo sunt, enim expedita deserunt perspiciatis accusantium numquam cupiditate nobis maiores vitae. Minus culpa recusandae accusantium praesentium tenetur reiciendis odio error laboriosam, mollitia! Dignissimos at molestiae quasi qui adipisci autem ad veritatis dolores voluptatem, saepe natus. Commodi laborum natus voluptate, sed provident vel tempore quos, in fugit aliquid dicta eaque eum quae error ex sunt eligendi facilis cupiditate repudiandae ipsam tenetur nam. Est laudantium, dolores error voluptates dolor, magni similique quam consectetur sit?
                    </div>
                </div>
                
                <div class="chapter chAttach" id="chapter12">
                    <div class="titleMainContent">Ускорение работы</div>
                    <div class="textMainContent">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit fugit molestiae suscipit ipsum atque repudiandae assumenda ut, mollitia sint quod magnam, nam dolor sit maxime necessitatibus quam. Magnam accusamus architecto quo aperiam dolores nemo obcaecati illum, cumque, aliquam libero et reprehenderit, enim quidem sed voluptate sequi numquam! Iusto nihil modi voluptatum ut quos consequatur consectetur nam perspiciatis repellat nobis. Quaerat suscipit aspernatur amet placeat impedit explicabo culpa vero molestias non. Doloremque eveniet assumenda vitae maiores, ex corporis laboriosam eum impedit architecto aliquid ducimus officia id expedita obcaecati quae in tempora quibusdam totam, minima velit non veritatis, iste mollitia ipsam? Et sint reiciendis facilis nostrum repellat veritatis dolorem accusamus deserunt, eum, illo quas iste ipsum nulla nisi tenetur, laudantium debitis enim. A alias expedita adipisci sed facere voluptas rem, porro nihil corporis distinctio repellendus vitae tempore totam ad laboriosam commodi culpa temporibus. Cumque minima aspernatur explicabo aperiam assumenda nemo officiis! Velit sapiente, accusantium eius delectus iusto, distinctio impedit perferendis corporis. Aut corporis optio voluptatum voluptas, voluptatibus quo, quae cupiditate pariatur qui vero quod ex. Nam numquam, dolorum ipsam voluptate aut ad dignissimos, sequi repudiandae hic. Ut voluptatum rem commodi aliquam saepe cumque, repellat nobis eaque maiores eum maxime ex voluptatibus esse consequuntur voluptatem architecto autem ducimus quisquam laboriosam cum quis vel quae impedit suscipit? Aspernatur unde, tempore modi! Vel reiciendis doloribus accusamus odio est officia at amet ipsum illo sunt, enim expedita deserunt perspiciatis accusantium numquam cupiditate nobis maiores vitae. Minus culpa recusandae accusantium praesentium tenetur reiciendis odio error laboriosam, mollitia! Dignissimos at molestiae quasi qui adipisci autem ad veritatis dolores voluptatem, saepe natus. Commodi laborum natus voluptate, sed provident vel tempore quos, in fugit aliquid dicta eaque eum quae error ex sunt eligendi facilis cupiditate repudiandae ipsam tenetur nam. Est laudantium, dolores error voluptates dolor, magni similique quam consectetur sit?
                    </div>
                </div>
                
            
                      
                <div class="chapter chAttach" id="chapter2">
                    <div class="titleMainContent"></div>
                    <div class="textMainContent">
                        
                    </div>
                </div>
                 
                                                 
                <div class="chapter chMain" id="chapter2">
                    <div class="titleMainContent"></div>
                    <div class="textMainContent">
                        
                    </div>
                </div>
                
                
            </div>
        </div>        
    </div>
</div>


<script>
$(document).ready(function() {
    var temp = '';
    $('.chapter').each(function(i,elem) {
        var tempMainClass = $(elem).attr('class').split(' ')[1];
        var tempTableConClass = '';
        if(tempMainClass == 'chMain')
            tempTableConClass = ' chapterMain';
        else 
            tempTableConClass = ' chapterAttach';
        
        temp += "<a class='itemTableContent" + tempTableConClass + "' href='#"  + $(elem).attr('id') + "'>" + $(".chapter:eq(" + i + ") .titleMainContent").html() + "</a>";
    });
    $('.listTableContent').html(temp);
    

    
});
</script>