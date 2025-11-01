/**
 * Modal Component
 * Only loaded when [data-modal] elements are present
 */

export class Modal {
    private element: HTMLElement;
    
    constructor(element: HTMLElement) {
        this.element = element;
        this.setupEvents();
    }
    
    private setupEvents(): void {
        // Close modal on backdrop click
        this.element.addEventListener('click', (e) => {
            if (e.target === this.element) {
                this.close();
            }
        });
    }
    
    open(): void {
        this.element.classList.remove('hidden');
    }
    
    close(): void {
        this.element.classList.add('hidden');
    }
    
    static initAll(): void {
        const modals = document.querySelectorAll<HTMLElement>('[data-modal]');
        modals.forEach(modal => new Modal(modal));
        console.log(`Initialized ${modals.length} modal(s)`);
    }
}
