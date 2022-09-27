const options = {
    backToTopBtn: `js-back-to-top`,
};

const init = () => {
    document.addEventListener(`click`, (e) => {
        if (e.target.matches(`.` + options.backToTopBtn)) {
            document.body.scrollTo({ top: 0, behavior: 'smooth' });
            document.documentElement.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
};

export { init };