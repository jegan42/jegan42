/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_display_file.c                                  :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/02 15:48:21 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/02 15:48:23 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "ft_display_file.h"

void	ft_display_file(char *name)
{
	int		file;
	char	c;

	file = open(name, O_RDONLY);
	if (file >= 0)
		while (read(file, &c, 1))
			write(1, &c, 1);
	close(file);
}

int		main(int ac, char **av)
{
	if (ac == 1)
		write(2, "File name missing.\n", 19);
	else if (ac > 2)
		write(2, "Too many arguments.\n", 20);
	else
		ft_display_file(av[1]);
	return (0);
}
