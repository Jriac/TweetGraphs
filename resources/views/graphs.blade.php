<!DOCTYPE html>
<meta charset="utf-8">
<style>

  body {
    font: 10px sans-serif;
  }

  .axis path,
  .axis line {
    fill: none;
    stroke: #000;
    shape-rendering: crispEdges;
  }

  .x.axis path {
    display: none;
  }

  .line {
    fill: none;
    stroke: steelblue;
    stroke-width: 1.5px;
  }

</style>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="/js/graphs.js">
</script>

  <form ng-submit="submit()" name="f1">

    <input type="hidden"  name="_token" value="{{ csrf_token() }}">

    <div class="top-row">
      <div class="field-wrap">
        <label>
          NOMBRE<span class="req">*</span>
        </label>
        <input type="text" name="username" ng-model="user.nom" required autocomplete="off" />
      </div>
    </div>
    <button ng-disabled="f1.$invalid" id="submit_register" class="button button-block" />Enviar</button>


  </form>
  </body>
  </html>
