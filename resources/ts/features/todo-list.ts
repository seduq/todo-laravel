/**
 * Todo List Feature
 * Only loaded when [data-todo] elements are present
 */

export function initTodoList(): void {
    console.log('Todo list initialized');
    
    // Example: Handle todo item clicks
    const todoItems = document.querySelectorAll<HTMLElement>('[data-todo-item]');
    todoItems.forEach(item => {
        item.addEventListener('click', handleTodoClick);
    });
}

function handleTodoClick(event: Event): void {
    const target = event.currentTarget as HTMLElement;
    console.log('Todo clicked:', target.dataset.todoId);
    
    // Your todo logic here
}
