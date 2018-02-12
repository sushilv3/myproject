console.log('js loaded');

async function submitForm() {
    console.log('button clicked...');
    const url = 'http://localhost/collegephp/kodecamp/list';

    const response = await window.fetch(url, );
    console.dir(response);
    // const result = await response.text();
    const result = await response.json();
    console.log(result.RegDetails);
    const liList = result.RegDetails.map((item) => {
        return `<li> ${item.name} </li>`;
    }).join("");

    document.querySelector('ul#content').innerHTML = liList;
}