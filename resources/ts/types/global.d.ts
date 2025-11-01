/**
 * Global type definitions for the application
 * This file extends the Window interface and other global types
 */

import { AxiosInstance } from 'axios';
import type { Alpine as AlpineType } from 'alpinejs';

declare global {
    interface Window {
        axios?: AxiosInstance;
        Alpine: AlpineType;
        Echo?: any;
        Pusher?: any;
    }
}

// Add module declaration for alpinejs
declare module 'alpinejs' {
    export interface Alpine {
        data(name: string, callback: () => any): void;
        store(name: string, data: any): void;
        start(): void;
        plugin(callback: (Alpine: Alpine) => void): void;
    }
    
    const Alpine: Alpine;
    export default Alpine;
}

export {};
