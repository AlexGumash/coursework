<div class="addCar">
  <form class="" action="addCarListener.php" method="post">
    <div class="form-container">
      <div class="form-input-div">
        <span>
          Название автомобиля:
        </span>
        <input type="text" name="name" class="form-input" required>
      </div>
      <div class="form-input-div">
        <span>
          Год постройки:
        </span>
        <select class="from-input" name="year" size="5">
          <option value="2005">2005</option>
          <option value="2006">2006</option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
        </select>
      </div>
      <div class="form-input-div">
        <span>
          Тип двигателя:
        </span>
        <select class="form-input" name="engine" required>
          <option value="ДВС">ДВС</option>
          <option value="Электрик">Электро</option>
        </select>
      </div>
      <div>
        <input class="post-request" type="submit" name="addCar" value="Добавить">
      </div>
    </div>
  </form>
</div>
