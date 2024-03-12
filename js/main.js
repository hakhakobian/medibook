function select(id) {
  if ( document.getElementById(id) !== null ) {
    document.getElementById(id).value = '';
  }
  document.getElementById('form').submit();
}

