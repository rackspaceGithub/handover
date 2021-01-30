function auto_grow(the_textarea) {
  the_textarea.style.height = "100%";
  the_textarea.style.width = "100%";
  the_textarea.style.height = (the_textarea.scrollHeight) + "px";
  the_textarea.style.width = (the_textarea.scrollWidth) + "px";
}