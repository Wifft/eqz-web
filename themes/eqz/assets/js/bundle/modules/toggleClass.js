export default function () {
    const elements = document.querySelectorAll('[data-toggle-class]')

    elements.forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.stopPropagation();
            event.preventDefault();

            const classToToggle = this.getAttribute('data-toggle-class');
            const container = this.getAttribute('data-toggle-class-container');
            const baseQuery = '[data-toggle-class-item]:not([data-toggle-class-not-this])'
            const itemsQuery = container ? container + ' ' + baseQuery : baseQuery;
            const itemsToToggle = document.querySelectorAll(itemsQuery);

            itemsToToggle.forEach(item => {
                item.classList.toggle(classToToggle)
            })

        })
    })
}
