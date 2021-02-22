let buttons = document.querySelectorAll('button');

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        setJson(button);
    })
})

function setJson(button) {
    let id = button.getAttribute('data-id');
    let method = button.getAttribute('data-method');
    let action = button.getAttribute('data-action');
    fetch(`/${method}/${action}/`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify({
                id: id
            })
        })
        .then(response => response.json())
        .then(data => document.querySelector('.count').innerText = data.count)
        .catch(error => console.log(error));

}