([
    {
        mustDeps: [
            {block: 'bootstrap'},
            {block: 'pagination'},
            {block: 'pagination', elem: 'link'}
        ]
    },
    {
        shouldDeps: [
            {block: 'pagination', elem: 'next', mod: 'disabled'}
        ]
    }
])