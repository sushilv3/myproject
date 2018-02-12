//                                          css selectors
const controls = document.querySelectorAll('button[type="submit"][rel*=ajax],a[rel*=ajax]');
console.log(controls);
controls.forEach((control) => {
    console.log('attaching listeners');
    control.addEventListener('click', (event) => {
        event.preventDefault();
    });
});

function request() {

}