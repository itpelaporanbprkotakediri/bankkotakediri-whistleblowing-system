<style>
    /* Page-specific styles */
    .timeline-line {
        position: absolute;
        left: 15px;
        top: 32px;
        bottom: 0;
        width: 2px;
        background-color: #E5E7EB;
    }

    .timeline-item:last-child .timeline-line {
        display: none;
    }

    .timeline-dot {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
        z-index: 10;
        flex-shrink: 0;
    }

    .timeline-dot.completed {
        background-color: #10B981;
        color: white;
    }

    .timeline-dot.active {
        background-color: #1E6FB8;
        color: white;
        box-shadow: 0 0 0 4px rgba(30, 111, 184, 0.2);
        animation: pulse 2s infinite;
    }

    .timeline-dot.pending {
        background-color: #F3F4F6;
        color: #9CA3AF;
        border: 2px solid #E5E7EB;
    }

    .timeline-content {
        padding-left: 1rem;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(30, 111, 184, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(30, 111, 184, 0); }
        100% { box-shadow: 0 0 0 0 rgba(30, 111, 184, 0); }
    }
</style>