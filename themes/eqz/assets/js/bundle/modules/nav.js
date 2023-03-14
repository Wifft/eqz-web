export default function (headerClass = '.c-header', stuckClass = 'stuck') {
    window.onscroll = () => {
        const headerElement = document.querySelector(headerClass);

        const scrollY = window.scrollY;
        if (scrollY > 100) {
            if (!headerElement.classList.contains(stuckClass)) {
                headerElement.classList.add(stuckClass)
            }
        } else if (scrollY) {
            headerElement.classList.remove(stuckClass)
        }
    }
}
