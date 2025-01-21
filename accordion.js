
/*
 * NOTE: This script must be loaded AFTER the accordion
 * I need to manually call this script from the theme's functions.php file,
 * because I can't figure out a way to call it into the footer from within block.json
 * 
 * JS borrowed and updated from https://www.w3.org/WAI/ARIA/apg/patterns/accordion/examples/accordion/
 */

'use strict';

class Accordion {
    constructor(domNode, accordions) {
        this.rootEl = domNode;
        this.buttonEl = this.rootEl.querySelector('button[aria-expanded]');
        this.accordions = accordions; 

        const controlsId = this.buttonEl.getAttribute('aria-controls');
        this.contentEl = document.getElementById(controlsId);

        this.open = this.buttonEl.getAttribute('aria-expanded') === 'true';

        this.updateContentVisibility();

        this.buttonEl.addEventListener('click', this.onButtonClick.bind(this));
    }

    onButtonClick() {
        this.toggle(!this.open);
        if (this.open) {
            this.accordions.forEach((accordion) => {
                if (accordion !== this) {
                    accordion.close();
                }
            });
        }
    }

    toggle(open) {
        if (open === this.open) {
            return;
        }

        this.open = open;
        this.buttonEl.setAttribute('aria-expanded', `${open}`);
        this.updateContentVisibility();
    }

    updateContentVisibility() {
        if (this.open) {
            this.contentEl.removeAttribute('hidden');
        } else {
            this.contentEl.setAttribute('hidden', '');
        }
    }

    open() {
        this.toggle(true);
    }

    close() {
        this.toggle(false);
    }
}

const accordionHeaders = document.querySelectorAll('.accordion .accordion-heading');
const accordionInstances = [];

accordionHeaders.forEach((accordionEl) => {
    const accordion = new Accordion(accordionEl, accordionInstances);
    accordionInstances.push(accordion);
});
    