
// this code my writing

declare module "@meforma/vue-toaster" {
  import { App } from "vue";

  export function createToaster(options?: {
    position?: string;
    duration?: number;
  }): {
    success(message: string): void;
    error(message: string): void;
    info(message: string): void;
    warning(message: string): void;
  };

  const plugin: {
    install(app: App): void;
  };

  export default plugin;
}