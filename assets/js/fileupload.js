(function ($) {
  /**
   * Create drag and drop element.
   */
  var customDragandDrop = function (element) {
    $(element).addClass("kwt-file__input");
    var element = $(element).wrap(
      `<div class="kwt-file"><div class="kwt-file__drop-area"><span class='kwt-file__choose-file ${
        element.attributes.data_btn_text
          ? "" === element.attributes.data_btn_text.textContent
            ? ""
            : "kwt-file_btn-text"
          : ""
      }'>${
        element.attributes.data_btn_text
          ? "" === element.attributes.data_btn_text.textContent
            ? `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5012 5.83241L7.08455 11.2491C6.75303 11.5806 6.56678 12.0302 6.56678 12.4991C6.56678 12.9679 6.75303 13.4176 7.08455 13.7491C7.41607 14.0806 7.86571 14.2668 8.33455 14.2668C8.80339 14.2668 9.25303 14.0806 9.58455 13.7491L15.0012 8.33241C15.6643 7.66937 16.0368 6.77009 16.0368 5.83241C16.0368 4.89473 15.6643 3.99545 15.0012 3.33241C14.3382 2.66937 13.4389 2.29688 12.5012 2.29688C11.5635 2.29687 10.6643 2.66937 10.0012 3.33241L4.58455 8.74908C3.58999 9.74364 3.03125 11.0926 3.03125 12.4991C3.03125 13.9056 3.58999 15.2545 4.58455 16.2491C5.57911 17.2436 6.92803 17.8024 8.33455 17.8024C9.74107 17.8024 11.09 17.2436 12.0846 16.2491L17.5012 10.8324" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`
            : `${element.attributes.data_btn_text.textContent}`
          : `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.5012 5.83241L7.08455 11.2491C6.75303 11.5806 6.56678 12.0302 6.56678 12.4991C6.56678 12.9679 6.75303 13.4176 7.08455 13.7491C7.41607 14.0806 7.86571 14.2668 8.33455 14.2668C8.80339 14.2668 9.25303 14.0806 9.58455 13.7491L15.0012 8.33241C15.6643 7.66937 16.0368 6.77009 16.0368 5.83241C16.0368 4.89473 15.6643 3.99545 15.0012 3.33241C14.3382 2.66937 13.4389 2.29688 12.5012 2.29688C11.5635 2.29687 10.6643 2.66937 10.0012 3.33241L4.58455 8.74908C3.58999 9.74364 3.03125 11.0926 3.03125 12.4991C3.03125 13.9056 3.58999 15.2545 4.58455 16.2491C5.57911 17.2436 6.92803 17.8024 8.33455 17.8024C9.74107 17.8024 11.09 17.2436 12.0846 16.2491L17.5012 10.8324" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>`
      }</span>${element.outerHTML}</span><span class="kwt-file__msg">${
        "" === element.placeholder
          ? "or drop files here"
          : `${element.placeholder}`
      }</span><div class="kwt-file__delete"></div></div></div>`
    );
    var element = element.parents(".kwt-file");

    // Add class on focus and drage enter event.
    element.on("dragenter focus click", ".kwt-file__input", function (e) {
      $(this).parents(".kwt-file__drop-area").addClass("is-active");
    });

    // Remove class on blur and drage leave event.
    element.on("dragleave blur drop", ".kwt-file__input", function (e) {
      $(this).parents(".kwt-file__drop-area").removeClass("is-active");
    });

    // Show filename when change file.
    element.on("change", ".kwt-file__input", function (e) {
      let filesCount = $(this)[0].files.length;
      let textContainer = $(this).next(".kwt-file__msg");
      if (1 === filesCount) {
        let fileName = $(this).val().split("\\").pop();
        textContainer
          .text(fileName)
          .next(".kwt-file__delete")
          .css("display", "block");
      } else if (filesCount > 1) {
        textContainer
          .text(filesCount + " files selected")
          .next(".kwt-file__delete")
          .css("display", "inline-block");
      } else {
        textContainer.text(
          `${
            "" === this[0].placeholder
              ? "or drop files here"
              : `${this[0].placeholder}`
          }`
        );
        $(this)
          .parents(".kwt-file")
          .find(".kwt-file__delete")
          .css("display", "none");
      }
    });

    // Delete selected file.
    element.on("click", ".kwt-file__delete", function (e) {
      let deleteElement = $(this);
      deleteElement.parents(".kwt-file").find(`.kwt-file__input`).val(null);
      deleteElement
        .css("display", "none")
        .prev(`.kwt-file__msg`)
        .text(
          `${
            "" ===
            $(this).parents(".kwt-file").find(".kwt-file__input")[0].placeholder
              ? "or drop files here"
              : `${
                  $(this).parents(".kwt-file").find(".kwt-file__input")[0]
                    .placeholder
                }`
          }`
        );
    });
  };

  $.fn.kwtFileUpload = function (e) {
    var _this = $(this);
    $.each(_this, function (index, element) {
      customDragandDrop(element);
    });
    return this;
  };
})(jQuery);

// Plugin initialize
jQuery(document).ready(function ($) {
  $(".demo1").kwtFileUpload();
});
