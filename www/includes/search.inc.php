<?php
    // Search 
/*    echo "<section class=\"box search\">";
      echo "<form method=\"post\" action=\"#\">";
        echo "<input type=\"text\" class=\"text\" name=\"search\" placeholder=\"Search\" />";
      echo "</form>";
    echo "</section>";
*/
    echo "<form method=\"get\" name=\"search\" id=\"searchform\" action=\"/finder/\">";
    echo "<input name=objtype id=objtype type=hidden>";
    echo "<span style=\"padding:5em;width:100%;text-shadow:none\">";
    echo "<select class=\"query\" name=\"state\" id=\"query\" onChange=\"this.form.submit()\">";
    echo "</select>";
    echo "</span>";
    echo "</form>";
?>
<SCRIPT>
  $('#query').select2({
    placeholder: "Search...",
    minimumInputLength: 4,
    multiple: false,
    createSearchChoice:function(term, data) {
      if ($(data).filter(function() {
        return this.text.localeCompare(term)===0; }).length===0) {
          return {id:term, text:term};
        }
    },
    ajax: {
      url: "/autocomplete/search/index.php",
      dataType: "json",
      type: "GET",
      delay: 250,
      data: function (term, page) {
        return {
          key: term
        };
      },
      results: function(data, page) {
        return { results: data };
      }
    }
  }).on("select2-selecting", function(e) {
    var elem = document.getElementById("objtype");
    document.search.query.value = e.object.id;
    document.search.objtype.value = e.object.type;
    document.search.submit();
  });
</SCRIPT>
