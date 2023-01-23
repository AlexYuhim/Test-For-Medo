<?php include_once "head.php";

// выводим все данные из бд
function allOrder() {
  $res = db_query("SELECT * FROM `test_for_medo`");
  while ($row = $res->fetch_assoc()) $result[] = $row;
  return $result;
}
  
  $result = allOrder();
?>
<main class='m-4 p-4'>  
<p>Немного вводной. При проверке почты, можно сразу проверить папку спам, скорее всего  </p>
<p>писмо будет там. Исходники можно посмотреть на <a target='_blank' href="https://github.com/AlexYuhim/Test-For-Medo.git">Git</a></p>


<h2>Привет это тест страница</h2>

<form action="ajax.php">
  <ul class="list-groop " >
    <li class="list-groop-item"><label>Продукт 1<input type="checkbox" name="name_product" value="product1" /></label></li>
    <li class="list-groop-item"><label>Продукт 2<input type="checkbox" name="name_product" value="product2" /></label></li>
    <li class="list-groop-item"><label>Продукт 3<input type="checkbox" name="name_product" value="product3" /></label></li>
    <li class="list-groop-item"><label>Продукт 4<input type="checkbox" name="name_product" value="product4" /></label></li>
  </ul>
  <label>
    <p>введите Ваш адрес электронной почты</p>
    <input type="email" name='mail'>
  </label>
  <div>
      <button type="botton" id='order' class="btn btn-primary mt-2">Заказать</button>
  </div>
</form>

<section class='response_from_the_database col-6 text-center'>
  <p>--------------------------------</p>
  <p>чтобы не лепить лишних страниц записи с БД выведу здесь </p>
  <table class="table border m-5">
  <thead>
    <tr>
      <th class='border' scope="col">email</th>
      <th scope="col">product</th>
    </tr>
  </thead>
<?php
if(isset($result)){
  foreach($result as $number_order=>$order){
  ?>
  <tbody>
    <tr>
      <td class='border' ><?=$order['mail']?></td>
      <td class='border'><?=$order['product']?></td>
    </tr>
    <tr>
  </tbody>
  <?}?>
<?}?>
</table>
<p>--------------------------------</p>
</section>
</main>
<script>
// обработка события клик по кнопке
  $("#order").click(function(evt) {
    evt.preventDefault(); //
    if (evt) {
      // собираем все чеки в массив
      const values_check = [];
        $('[name="name_product"]:checked').each(function(){
          values_check.push($(this).val());
        }); 
      const mail = $('[name="mail"]').val();
      // отправляем запрос
      fetch("ajax.php?value_check="+values_check+"&mail="+mail+"&order=order")
      .then(response => response.text())
      .then(commits => {
  		  location.reload();
        });
    }
  });

</script>
</body>
</html>


