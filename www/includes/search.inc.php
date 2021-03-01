<?php
    // Search 
    echo "<form method=\"get\" name=\"search\" id=\"searchform\" action=\"/finder/\">";
    echo "<input name=objtype id=objtype type=hidden>";
    echo "<span style=\"padding:10px;width:100%;text-shadow:none\">";
    echo "<select class=\"query\" name=\"query\" id=\"query\" >";
    echo "</select>";
    echo "</span>";
    echo "</form>";
?>
<SCRIPT>
  $('#query').select2({
    placeholder: "Search...",
    minimumInputLength: 3,
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
  }).on("select2:select", e=> {
    var elem = document.getElementById("objtype");
    document.search.query.value = e.params.data.id;
    document.search.objtype.value = e.params.data.type;
    document.search.submit();
  });
</SCRIPT>
