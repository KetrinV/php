const authorSelect = document.getElementById('author-dd');

authorSelect.addEventListener('change', function () {
    console.log('You selected: ', this.value, this.options[this.selectedIndex].text);
    console.log(document.querySelector('.author-row'));
});