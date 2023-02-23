const clean = x => x.toLowerCase()
                    .replace(/\(.+?\)/g, '')
                    .replace(/[^\w,]/g, '')
                    .trim();

export const translation = (learnable) => (
    learnable.translation
    || learnable.translations.find(t => t.authoritative)
    || learnable.translations[0]
).translation;

export const matches = (input, expected) => {
    const accepted = (typeof expected === 'string' ? [ expected ] : expected)
        .map(x => clean(x).split(','))
        .flat();

    return accepted.includes(clean(input));
}
