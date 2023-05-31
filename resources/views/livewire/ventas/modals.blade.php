<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Venta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="operacion"></label>
                        <input wire:model="operacion" type="text" class="form-control" id="operacion" placeholder="Operacion">@error('operacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="detalle"></label>
                        <input wire:model="detalle" type="text" class="form-control" id="detalle" placeholder="Detalle">@error('detalle') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="monto"></label>
                        <input wire:model="monto" type="text" class="form-control" id="monto" placeholder="Monto">@error('monto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ticket_ventas"></label>
                        <input wire:model="ticket_ventas" type="text" class="form-control" id="ticket_ventas" placeholder="Ticket Ventas">@error('ticket_ventas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="factura_ventas"></label>
                        <input wire:model="factura_ventas" type="text" class="form-control" id="factura_ventas" placeholder="Factura Ventas">@error('factura_ventas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cuit"></label>
                        <input wire:model="cuit" type="text" class="form-control" id="cuit" placeholder="Cuit">@error('cuit') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cuil"></label>
                        <input wire:model="cuil" type="text" class="form-control" id="cuil" placeholder="Cuil">@error('cuil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Venta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="operacion"></label>
                        <input wire:model="operacion" type="text" class="form-control" id="operacion" placeholder="Operacion">@error('operacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="detalle"></label>
                        <input wire:model="detalle" type="text" class="form-control" id="detalle" placeholder="Detalle">@error('detalle') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="monto"></label>
                        <input wire:model="monto" type="text" class="form-control" id="monto" placeholder="Monto">@error('monto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ticket_ventas"></label>
                        <input wire:model="ticket_ventas" type="text" class="form-control" id="ticket_ventas" placeholder="Ticket Ventas">@error('ticket_ventas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="factura_ventas"></label>
                        <input wire:model="factura_ventas" type="text" class="form-control" id="factura_ventas" placeholder="Factura Ventas">@error('factura_ventas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cuit"></label>
                        <input wire:model="cuit" type="text" class="form-control" id="cuit" placeholder="Cuit">@error('cuit') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cuil"></label>
                        <input wire:model="cuil" type="text" class="form-control" id="cuil" placeholder="Cuil">@error('cuil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
