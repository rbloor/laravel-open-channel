const options = {
    truncateText: `js-truncate-text`,
    truncateToggle: `js-truncate-toggle`,
};

const init = () => {
    const truncates = document.getElementsByClassName(options.truncateText);

    if (truncates.length > 0) {
        [...truncates].forEach((truncate) => {
            let btnToggle = truncate.parentNode.querySelector(`.` + options.truncateToggle);
            if (truncate.offsetHeight < truncate.scrollHeight) {
                btnToggle.classList.remove('hidden');
            }
        });
    }

    document.addEventListener(`click`, (e) => {
        if (e.target.matches(`.` + options.truncateToggle)) {
            let text = e.target.parentNode.querySelector(`.` + options.truncateText);
            text.classList.toggle('line-clamp-2');
            e.target.innerText = text.classList.contains('line-clamp-2') ? 'read more' : 'read less';
        }
    });
};

export { init };