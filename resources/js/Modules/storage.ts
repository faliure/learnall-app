import { ref as vueRef, watch } from 'vue';

export default function storage(key: string, defaultValue: unknown = '') {
  const stored = localStorage.getItem(`stored-${key}`);

  return (stored === null) ? defaultValue : JSON.parse(stored);
}

export const read = storage;

export function write(key: string, value: unknown) {
  return localStorage.setItem(`stored-${key}`, JSON.stringify(value));
}

export function ref(key: string, defaultValue: unknown = '') {
  const value = storage(key, defaultValue);
  const item = vueRef(value);

  watch(
    item,
    () => write(key, item.value),
    { deep: typeof value !== 'string' },
  );

  return item;
}
