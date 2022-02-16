/*
 * Spidera-asp
 * Copyright (C) 2022  Ossian Eriksson
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

import { render, useState, useEffect } from '@wordpress/element';
import { Modal } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import './popup.scss';

function Popup(): JSX.Element {
	const [open, setOpen] = useState(false);
	const closeModal = () => setOpen(false);

	useEffect(() => {
		const timer = setTimeout(() => {
			setOpen(true);
		}, 10000);
		return () => clearTimeout(timer);
	}, []);

	if (!open) {
		return <></>;
	}

	return (
		<Modal
			title={__(
				'OBS: Change of location: FL51! Visit the asp of Spidera!',
				'spidera-asp'
			)}
			onRequestClose={closeModal}
		>
			<p>{__('Bring your own computer!', 'spidera-asp')}</p>
			<img className="asp-img" src={php.imgUrl} />
		</Modal>
	);
}

document.addEventListener('DOMContentLoaded', () => {
	const root = document.createElement('div');
	document.body.appendChild(root);
	render(<Popup />, root);
});
