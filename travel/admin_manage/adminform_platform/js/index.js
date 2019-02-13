(function() {
  var formsetChoice = {
    init: function() {
      this.cacheDom();
      this.bindEvents();
      this.updForm();
    },
    cacheDom: function(){
      this.formsetSelector = "#formset-placeholder";
      this.choiceSelector = ".dynamic-form";
      this.addSelector = ".add-form-row";
      this.delSelector = ".delete-form-row";
      
      this.$choicesPlaceHolder = $(this.formsetSelector);
      // find add button
      this.$addButton = this.$choicesPlaceHolder.find(this.addSelector);
      // find delete buttons
      this.$delButtons = this.$choicesPlaceHolder.find(this.delSelector);
      // find TOTAL_NUM_FORMS
      this.$totalField = this.$choicesPlaceHolder.find("#id_form-TOTAL_FORMS");
      // find MIN_NUM_FORMS
      this.$minChoices = Number(this.$choicesPlaceHolder.find("#id_form-MIN_NUM_FORMS").val());
      // find MAX_NUM_FORMS
      this.$maxChoices = Number(this.$choicesPlaceHolder.find("#id_form-MAX_NUM_FORMS").val());
      // last sibling
      this.$lastSibling = this.$choicesPlaceHolder.find(this.choiceSelector + ":last");
      // empty form
      this.$emptyForm = this.$lastSibling.clone(true)
      this.$emptyForm.find("input").removeAttr("checked")
        .removeAttr("selected")
        .not(":button, :submit, :reset, [type='hidden'], :radio, :checkbox")
        .val("")
        .attr("value", ""); // Handle UpdateView default values
    },
    bindEvents: function() {
    // on click add
      this.$addButton.on("click", this.addForm.bind(this));
    // on click delete
      this.$choicesPlaceHolder.delegate(this.delSelector, "click", this.delForm.bind(this));
    },
    updForm: function() {
      var $fields = this.$choicesPlaceHolder.find("input[type='text']");
      var newTotal = $fields.length
      
      for(var i = 0; i < newTotal; i++) {
        var field = $fields.get(i);
        $(field).attr("id", "id_form-" + i + "-option");
        $(field).attr("name", "form-" + i + "-option");
      }
      this.$totalField.val(newTotal);
      this.$delButtons = this.$choicesPlaceHolder.find(this.delSelector);
      
      if(newTotal === this.$maxChoices)
        this.$addButton.attr("disabled", "disabled");
      else if(this.$addButton.attr("disabled") === "disabled")
        this.$addButton.removeAttr("disabled");
      
      if(newTotal === this.$minChoices)
        this.$delButtons.attr("disabled", "disabled");
      else if(this.$delButtons.attr("disabled") === "disabled")
        this.$delButtons.removeAttr("disabled");
    },
    // DEFINE LISTENERS -----------------------------------------
    addForm: function() {
      var $newSibling = this.$emptyForm.clone(true);
    //   add new choice field
      $newSibling.insertAfter(this.$lastSibling);
    //   update
      this.$lastSibling = this.$choicesPlaceHolder.find(this.choiceSelector + ":last");
      this.updForm();
    },
    delForm: function(event) {
    //   delete choice field
      this.$choicesPlaceHolder.find(event.target).closest(this.choiceSelector).remove();
    //   update
      if(this.$choicesPlaceHolder.find(this.choiceSelector).length > 0)
        this.$lastSibling = this.$choicesPlaceHolder.find(this.choiceSelector + ":last");
      else
        this.$lastSibling = this.$choicesPlaceHolder.find(":last-child");
      this.updForm();
    },
  };
  formsetChoice.init();
})()